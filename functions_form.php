<?php


// GET POSTED DATA FROM FORM
// TO DO REMAME FUNCTION
add_action( 'admin_post_nopriv_application_form',    'process_application_form'   );
add_action( 'admin_post_application_form',  'process_application_form' );



function process_application_form() {

    $referer = $_SERVER['HTTP_REFERER'];
    $referer =  explode('?',   $referer)[0];


    ////////////
    // RECAPTCHA
    $recaptcha = new \ReCaptcha\ReCaptcha( RECAPTCHA_SECRET );
    $gRecaptchaResponse = $_POST['g-recaptcha-response'];
    $remoteIp = $_SERVER['REMOTE_ADDR'];
    $resp = $recaptcha->verify($gRecaptchaResponse, $remoteIp);
    if ($resp->isSuccess()) { // IS verified!



        // IF DATA HAS BEEN POSTED
        if ( isset($_POST['action'])  && $_POST['action'] == 'application_form'   ) :





            $language = ( isset($_POST['current_language']) && $_POST['current_language'] !== '' ) ?  $_POST['current_language'] : 'fr';

            $fullname = $_POST['first_name'] . ' ' . $_POST['last_name'];

            $post = array(
                'post_title'     => $fullname,
                'post_status'    => 'publish',
                'post_type'      => 'application',
                'post_content'   => ''
            );
            $new_application = wp_insert_post( $post );

            if ($new_application == 0) {
                //    $redirect = get_home_url(); // . '/redirect-to-this-page';
                wp_redirect( $referer . '?problem' );
            } else {


                $fields = all_application_fields();

                foreach ($fields as $field => $translation ) {
                    if (isset($_POST[$field])){
                        add_post_meta($new_application, $field,  $_POST[$field] , true);
                    }
                }



                //if filesize of upload is greater than 0 bytes, ie it exists
                // add or replace the file already there
                $photo_file = $_FILES['photo'];
                if ($photo_file['size'] > 0 ) {
                    $picture_id = application_add_file_upload( $photo_file, $new_application );
                    $thumbnail = set_post_thumbnail( $new_application, $picture_id );
                }



                $insurance_file = $_FILES['insurance_attestation'];
                if ($insurance_file['size'] > 0 ) {
                    $file_id = application_add_file_upload( $insurance_file, $new_application );
                    update_field( 'insurance_attestation', $file_id,  $new_application  );
                }


                // get raw post data, and convert properties and values to nice string
                $data = convert_post_to_data($new_application, $_POST, $photo_file, $insurance_file,    $language);


                // SEND EMAILS TO THE ADMIN AND THE PERSON WHO SUBMITTED
                send_application_emails( $data, $language);


                //  $redirect = get_home_url(); // . '/redirect-to-this-page/';
                wp_redirect( $referer . '?success' );
            }


            exit;



        endif;


    } else { // recaptcha has errors. dont allow to add application
        $errors = $resp->getErrorCodes();
        var_dump($errors);
        // wp_redirect( $referer . '?problem&recaptcha' );
    } // END OF NOT VERIFIED BY RECAPTCHA



}



function send_application_emails($data, $language){



    $headers = 'From: ENSR Summercamp <info@ensr.ch>' . "\r\n";
    $emailheader = file_get_contents(dirname(__FILE__) . '/emails/email_header.php');
    $emailfooter = file_get_contents(dirname(__FILE__) . '/emails/email_footer.php');
    add_filter('wp_mail_content_type',create_function('', 'return "text/html"; '));


    $paragraph_for_admin = '<p>Une nouvelle inscription a été enregistrée pour le camp d’été :</p><br /><br />';
    $email_subject_for_admin = 'Nouvelle inscription au Camp d’été ENSR';
    $app_summary_for_admin = generate_application_summary( 'fr', $data);
    $email_content_for_admin = $emailheader  . $paragraph_for_admin .  $app_summary_for_admin . $emailfooter;
    wp_mail( 'info@ensr.ch' , $email_subject_for_admin, $email_content_for_admin, $headers );



        $paragraph_for_user =  chilly_translate_string('<p>Congratulations!</p><p>You are now registered to our Summer camp in Champéry!
An enrolment confirmation will be sent to you within a week.</p><p>Should you have any questions, please do not hesitate to contact us on our email address info@ensr.ch</p><p>We thank you for your trust!</p><p>The ENSR team</p><br /><br /><p><strong>Registration summary :</strong></p>', $language);


    $email_subject_for_user = chilly_translate_string('Your application to ENSR Summer Camp', $language);
    $data_for_user = $data;
    // remove insurance and photo file for user email
    $data_for_user['insurance_attestation'] = '';
    $data_for_user['photo'] = '';
    $app_summary_for_user = generate_application_summary( $language, $data_for_user);
    $email_content_for_user = $emailheader . $paragraph_for_user .  $app_summary_for_user . $emailfooter;

    wp_mail( $_POST['email'], $email_subject_for_user, $email_content_for_user, $headers );



    remove_filter( 'wp_mail_content_type', 'wpdocs_set_html_mail_content_type' );



}

function chilly_translate_string($string, $language) {

        global $sitepress;
        $sitepress->switch_lang($language, true);

        return __($string, 'webfactor');

}


function generate_application_summary( $language, $data ) {


    global $sitepress;
    $sitepress->switch_lang($language, true);

    $body = '';

    foreach (all_application_fields() as $field => $translation) {
        if ( isset($data[$field]) && $data[$field] != '' ) {

            if ($field == 'terms') {
                // dont show terms
            } else {
                $body .= '<p><strong>' . __($translation, 'webfactor') . '</strong>: <br /> ';

                if (  is_array( $data[$field] )   ) {
                    $body .=    implode($data[$field], ', ') ;
                } else {
                    $body .=   nl2br($data[$field]) ;
                }

                $body .= '</p>';
            }

        }
    }



    return $body;


}




function convert_post_to_data($application_id, $post, $photo_file, $insurance_file,  $language) {
    global $sitepress, $wpdb;
    $sitepress->switch_lang($language, true);


    foreach ($post as $key => $value) {

        if ( $key == 'level_written' || $key == 'level_spoken') {

            if ($value == 'never_studied') {
                $post[$key] = __('Never studied', 'webfactor');
            } else if ($value == 'one_year') {
                $post[$key] = __('1 year', 'webfactor');
            } else if ($value == 'two_years') {
                $post[$key] = __('2 years', 'webfactor');
            } else if ($value == 'three_years') {
                $post[$key] = __('3 years', 'webfactor');
            } else if ($value == 'more_then_four_years') {
                $post[$key] = __('+4 years', 'webfactor');
            }

        } else if ( $key == 'dates_stay') {

            $new_value = array();
            foreach ($post[$key] as $array_value) {
                if ($array_value == 'week1' ) {
                    $translated_value = '01.07.2018 - 07.07.2018';
                } else if ($array_value == 'week2' ) {
                    $translated_value = '08.07.2018 - 14.07.2018';
                } else if ($array_value == 'week3' ) {
                    $translated_value = '15.07.2018 - 21.07.2018';
                } else if ($array_value == 'week4' ) {
                    $translated_value = '22.07.2018 - 28.07.2018';
                } else if ($array_value == 'week5' ) {
                    $translated_value = '29.07.2018 - 04.08.2018';
                } else if ($array_value == 'delf' ) {
                    $translated_value = '08.07.2018 - 04.08.2018 ' .   __('(DELF preparation)', 'webfactor');
                } else if ($array_value == 'cambridge' ) {
                    $translated_value = '08.07.2018 - 04.08.2018 ' . __('(Cambridge preparation)', 'webfactor');
                } else {
                    $translated_value = $array_value;
                }
                array_push($new_value,  $translated_value );
            }

            $post[$key] = $new_value;


        } else if ( $key == 'lesson_choice') {
            $new_value = array();
            foreach ($post[$key] as $array_value) {
                if ($array_value == 'delf_a1') {
                    $translated_value = __('Preparation DELF - level A1', 'webfactor');
                } else if ($array_value == 'delf_a2') {
                    $translated_value = __('Preparation DELF - level A2', 'webfactor');
                } else if ($array_value == 'cambridge_a1') {
                    $translated_value = __('Preparation Cambridge - level A1', 'webfactor');
                } else if ($array_value == 'cambridge_a2') {
                    $translated_value = __('Preparation Cambridge - level A2', 'webfactor');
                } else if ($array_value == 'french') {
                    $translated_value = __('French', 'webfactor');
                } else if ($array_value == 'english') {
                    $translated_value = __('English', 'webfactor');
                } else if ($array_value == 'multisports') {
                    $translated_value = __('Multisports (available from 28/6 to 18/07)', 'webfactor');
                } else {
                    $translated_value = $array_value;
                }
                array_push($new_value,  $translated_value );
            }


            $post[$key] = $new_value;


        } else if ( $key == 'transportation') {
            if ($value == 'none') {
                $post[$key] = __('On my own', 'webfactor');
            } else if ($value == 'gcg') {
                $post[$key] = __('Geneva - Champéry - Geneva', 'webfactor');
            }


        } else if ( $key == 'hit_we') {
            if ($value == 'enrol') {
                $post[$key] = __('Enrolled', 'webfactor');
            } else if ($value == 'dont_enrol') {
                $post[$key] = __('Not enrolled', 'webfactor');
            }


        }  else if ( $key == 'insurance') {
            if ($value == 'buy') {
                $post[$key] = __('Health and accident insurance, compulsory for residents out of EU/EEA/Switzerland, at CHF 150.-/week (franchise/excess of CHF 0.-)', 'webfactor');
            } else if ($value == 'own') {
                $post[$key] = __('My own insurance (name + please send us a certificate)', 'webfactor');
            }
        } else if ( $key == 'sex') {
            if ($value == 'male') {
                $post[$key] = __('Male', 'webfactor');
            } else if ($value == 'female') {
                $post[$key] = __('Female', 'webfactor');
            }
        } else if ( $key == 'hear_about_summer_camp') {

            $new_value = array();
            foreach ($post[$key] as $array_value) {
                if ($array_value == 'website') {
                    $translated_value = __("Ecole Nouvelle's website", 'webfactor');
                } else if ($array_value == 'friends') {
                    $translated_value = __(  'Friends' , 'webfactor');
                } else if ($array_value == 'brochure') {
                    $translated_value = __(  'Summer Camp brochure'  , 'webfactor');
                } else if ($array_value == 'agency') {
                    $translated_value = __(  'Agency'  , 'webfactor');
                } else if ($array_value == 'other') {
                    $translated_value = __( 'Other'   , 'webfactor');
                } else {
                    $translated_value = $array_value;
                }
                array_push($new_value,  $translated_value );
            }


            $post[$key] = $new_value;


        }

        // IF they uploaded an insurance doc, or a photo, show the link to it
        if ( $insurance_file['size'] > 0 ) {

            $insurance_id = get_field( 'insurance_attestation', $application_id  );
            $insurance_link = $wpdb->get_row( $wpdb->prepare( "SELECT guid FROM $wpdb->posts WHERE ID =  %d ", $insurance_id ) );
            $post['insurance_attestation'] = $insurance_link->guid;
        }
        if ( $photo_file['size'] > 0 ) {
            $photo_id = get_field( 'insurance_attestation', $application_id  );
            $photo_link = $wpdb->get_row( $wpdb->prepare( "SELECT guid FROM $wpdb->posts WHERE ID =  %d ", $photo_id ) );
            $post['photo'] = $photo_link->guid;
        }





    }


    return $post;
}




function all_application_fields(){

    return array(
        'first_name' => 'First Name',
        'last_name' => 'Last Name',
        'birth_date' => 'Birth Date',
        'sex' => 'Sex',
        'nationality' => 'Nationality',
        'passport_number' => 'Passport No. / Identity Card number (Swiss citizens only)',
        'valid_until' => 'Valid until',
        'mother_tongue' => 'Mother tongue',
        'school_name_address' => 'Name and address of your child\'s school',
        'class_grade' => 'Class, grade',
        'representative' => 'Representative',
        'address' => 'Private address',
        'city_country' => 'City / Country',
        'email' => 'Email',
        'phone' => 'Phone',
        'mobile_phone' => 'Mobile phone',
        'fax' => 'Fax',
        'photo' => 'Photo',
        'lesson_choice' => 'Choice of lessons',
        'level_spoken' => 'Spoken level',
        'level_written' => 'Written level',
        'dates_stay' => 'Dates of the stay',
        'transportation' => 'Transportation',
        'hit_we' => 'Hit of the week-end',
        'insurance' => 'Insurances',
        'insurance_name' => 'Name',
        'insurance_attestation' => 'Certificate',
        'hear_about_summer_camp' => 'How did you hear about the summer camp?',
        'friends_recommendation' => 'Friends',
        'agency_recommendation' => 'Agency',
        'other_recommendation' => 'Other',
        'place_date' => 'Place and date',
        'terms' => 'terms'

    );

};



function application_add_file_upload($file, $parent){
    $upload = wp_upload_bits($file['name'], null, file_get_contents( $file['tmp_name'] ) );
    $wp_filetype = wp_check_filetype( basename( $upload['file'] ), null );
    $wp_upload_dir = wp_upload_dir();


    $attachment = array(
        'guid' => $wp_upload_dir['baseurl'] . _wp_relative_upload_path( $upload['file'] ),
        'post_mime_type' => $wp_filetype['type'],
        'post_title' => preg_replace('/\.[^.]+$/', '', basename( $upload['file'] )),
        'post_content' => '',
        'post_status' => 'inherit'
    );

    $attach_id = wp_insert_attachment( $attachment, $upload['file'], $parent );


    return $attach_id;

}


add_action( 'manage_posts_extra_tablenav', 'add_download_link'  );
function add_download_link($which){

    if ( is_post_type_archive('application') ) {
        if($which == 'bottom'){
            $download_link = get_home_url() . '/api/v1/?applications';
            echo '<div class="alignleft actions"><a class="action button-primary button" href="'. $download_link .'">Télécharger CSV</a></div>';
        }
    }


}


?>
