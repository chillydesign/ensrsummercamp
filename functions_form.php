<?php


// GET POSTED DATA FROM FORM
// TO DO REMAME FUNCTION
add_action( 'admin_post_nopriv_application_form',    'process_application_form'   );
add_action( 'admin_post_application_form',  'process_application_form' );



function process_application_form() {

    $referer = $_SERVER['HTTP_REFERER'];
    $referer =  explode('?',   $referer)[0];

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

            foreach ($fields as $field ) {
                if (isset($_POST[$field])){
                    add_post_meta($new_application, $field,  $_POST[$field] , true);
                }
            }


            // SEND EMAILS TO THE ADMIN AND THE PERSON WHO SUBMITTED
            send_application_emails($language);



        //    $redirect = get_home_url(); // . '/redirect-to-this-page/';
            wp_redirect( $referer . '?success' );
        }


        exit;



    endif;


}



function send_application_emails($language){



    $headers = 'From: ENSR Summercamp <noreply@ensrsummercamp.ch>' . "\r\n";
    $emailheader = file_get_contents(dirname(__FILE__) . '/emails/email_header.php');
    $emailfooter = file_get_contents(dirname(__FILE__) . '/emails/email_footer.php');
    add_filter('wp_mail_content_type',create_function('', 'return "text/html"; '));


    $paragraph_for_admin = 'This is an opening paragraph for the admin';
    $email_subject_for_admin = 'An email subject for the admin';
    $email_body_for_admin = generate_email_body($paragraph_for_admin, $language);
    wp_mail( 'harvey.charles@gmail.com' , $email_subject_for_admin, $email_body_for_admin, $headers );



    $paragraph_for_user = 'This is an opening paragraph for the user';
    $email_subject_for_user = 'An email subject for the user';
    $email_body_for_user = generate_email_body($paragraph_for_admin, $language);
    wp_mail( $_POST['email'], $email_subject_for_user, $email_body_for_user, $headers );



    remove_filter( 'wp_mail_content_type', 'wpdocs_set_html_mail_content_type' );



}


function generate_email_body( $opening_paragraph, $language ) {

    global $sitepress;
    $sitepress->switch_lang($language, true);

    $body = '';
    $body .= '<p>' . $opening_paragraph . '</p>';
    $body .= '<p>' . __('something translated', 'webfactor') . '</p>';
    $body .= ICL_LANGUAGE_CODE;
    $body .= ICL_LANGUAGE_CODE;
    $body .= ICL_LANGUAGE_CODE;
    $body .= ICL_LANGUAGE_CODE;
    $body .= ICL_LANGUAGE_CODE;
    $body .= ICL_LANGUAGE_CODE;

    return $body;


}









function all_application_fields(){

    return array(
        'first_name',
        'last_name',
        'birth_date',
        'sex',
        'nationality',
        'passport_number',
        'valid_until',
        'mother_tongue',
        'school_name_address',
        'class_grade',
        'representative',
        'address',
        'city_country',
        'email',
        'phone',
        'mobile_phone',
        'fax',
        'photo',
        'lesson_choice',
        'level_spoken',
        'level_written',
        'dates_stay',
        'transportation',
        'hit_we',
        'insurance',
        'insurance_name',
        'insurance_attestation',
        'hear_about_summer_camp',
        'friends_recommendation',
        'agency_recommendation',
        'other_recommendation',
        'place_date',
        'terms'

    );

};

?>
