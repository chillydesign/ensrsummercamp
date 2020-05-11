<div class="container">
    <h2 style="margin:-110px 0 30px"><?php _e('Application form', 'webfactor'); ?></h2>
    <?php if (isset($_GET['success'])) : ?>
        <p class="success"> <?php _e('The form was submitted succesfully.', 'webfactor'); ?> </p>
    <?php endif; ?>
    <?php if (isset($_GET['problem'])) : ?>
        <p class="problem"> <?php _e('There was a problem submitting your form. Please try again.', 'webfactor'); ?> </p>
    <?php endif; ?>

    <form id="application_form" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-sm-6">
                <h2><?php _e('Personal Information', 'webfactor'); ?></h2>

                <div class="row">
                    <div class="col-sm-6"><label for="first_name"><?php _e('First Name', 'webfactor'); ?>*</label> </div>
                    <div class="col-sm-6"><input type="text" name="first_name"></div>
                </div>

                <div class="row">
                    <div class="col-sm-6"><label for="last_name"><?php _e('Last Name', 'webfactor'); ?>*</label> </div>
                    <div class="col-sm-6"><input type="text" name="last_name"></div>
                </div>

                <div class="row">
                    <div class="col-sm-6"><label for="birth_date"><?php _e('Birth Date', 'webfactor'); ?>*</label> </div>
                    <div class="col-sm-6"><input type="date" name="birth_date"></div>
                </div>

                <div class="row">
                    <div class="col-sm-6"><label for="sex"><?php _e('Sex', 'webfactor'); ?>*</label> </div>
                    <div class="col-sm-6" style="padding-top:15px;"><input type="radio" name="sex" value="male"><span><?php _e('Male', 'webfactor'); ?></span><input type="radio" name="sex" value="female"><span><?php _e('Female', 'webfactor'); ?></span> </div>
                </div>

                <div class="row">
                    <div class="col-sm-6"><label for="nationality"><?php _e('Nationality', 'webfactor'); ?>*</label> </div>
                    <div class="col-sm-6"><input type="text" name="nationality"></div>
                </div>

                <div class="row">
                    <div class="col-sm-6"><label for="passport_number"><?php _e('Passport No. / Identity Card number (Swiss citizens only)', 'webfactor'); ?>*</label> </div>
                    <div class="col-sm-6"><input type="text" name="passport_number" style="margin-top:15px"></div>
                </div>

                <div class="row">
                    <div class="col-sm-6"><label for="valid_until"><?php _e('Valid until', 'webfactor'); ?>*</label> </div>
                    <div class="col-sm-6"><input type="text" name="valid_until"></div>
                </div>

                <div class="row">
                    <div class="col-sm-6"><label for="mother_tongue"><?php _e('Mother tongue', 'webfactor'); ?>*</label> </div>
                    <div class="col-sm-6"><input type="text" name="mother_tongue"></div>
                </div>

                <div class="row">
                    <div class="col-sm-6"><label for="school_name_address"><?php _e('Name and address of your child\'s school', 'webfactor'); ?></label> </div>
                    <div class="col-sm-6"><textarea name="school_name_address" cols="30" rows="4"></textarea></div>
                </div>

                <div class="row">
                    <div class="col-sm-6"><label for="class_grade"><?php _e('Class, grade', 'webfactor'); ?></label> </div>
                    <div class="col-sm-6"><input type="text" name="class_grade"></div>
                </div>

                <div class="row">
                    <div class="col-sm-6"><label for="representative"><?php _e('Name of parents or legal representative', 'webfactor'); ?>*</label> </div>
                    <div class="col-sm-6"><textarea name="representative" cols="30" rows="4"></textarea></div>
                </div>

                <div class="row">
                    <div class="col-sm-6"><label for="address"><?php _e('Private address', 'webfactor'); ?>*</label> </div>
                    <div class="col-sm-6"><input type="text" name="address"></div>
                </div>

                <div class="row">
                    <div class="col-sm-6"><label for="city_country"><?php _e('City / Country', 'webfactor'); ?>*</label> </div>
                    <div class="col-sm-6"><input type="text" name="city_country"></div>
                </div>

                <div class="row">
                    <div class="col-sm-6"><label for="email"><?php _e('Email', 'webfactor'); ?>*</label> </div>
                    <div class="col-sm-6"><input type="email" name="email"></div>
                </div>

                <div class="row">
                    <div class="col-sm-6"><label for="phone"><?php _e('Phone', 'webfactor'); ?>*</label> </div>
                    <div class="col-sm-6"><input type="text" name="phone"></div>
                </div>

                <div class="row">
                    <div class="col-sm-6"><label for="mobile_phone"><?php _e('Mobile phone', 'webfactor'); ?>*</label> </div>
                    <div class="col-sm-6"><input type="text" name="mobile_phone"></div>
                </div>

                <div class="row">
                    <div class="col-sm-6"><label for="fax"><?php _e('Fax', 'webfactor'); ?></label> </div>
                    <div class="col-sm-6"><input type="text" name="fax"></div>
                </div>

            </div>

            <div class="col-sm-6">
                <h2><?php _e('Target audience', 'webfactor'); ?></h2>
                <p><?php _e('Boys and girls from <strong>9 to 18 years of age.</strong>', 'webfactor'); ?></p>
                <p><?php _e('<strong>Passport photo</strong>', 'webfactor'); ?></p> <br>
                <input type="file" name="photo">


                <h2><?php _e('Choice of lessons', 'webfactor'); ?>*</h2>
                <input type="checkbox" name="lesson_choice[]" value="multisports"><span class="float_span"><?php _e('Multisports (available from 28/6 to 18/07)', 'webfactor'); ?></span><br>
                <input type="checkbox" name="lesson_choice[]" value="delf_a1"><span class="float_span"><?php _e('Preparation DELF - level A1', 'webfactor'); ?></span><br>
                <input type="checkbox" name="lesson_choice[]" value="delf_a2"><span class="float_span"><?php _e('Preparation DELF - level A2', 'webfactor'); ?></span><br>
                <input type="checkbox" name="lesson_choice[]" value="cambridge_a1"><span class="float_span"><?php _e('Preparation Cambridge - level A1', 'webfactor'); ?></span><br>
                <input type="checkbox" name="lesson_choice[]" value="cambridge_a2"><span class="float_span"><?php _e('Preparation Cambridge - level A2', 'webfactor'); ?></span><br>
                <input type="checkbox" name="lesson_choice[]" value="french"><span class="float_span"><?php _e('French', 'webfactor'); ?></span><br>
                <input type="checkbox" name="lesson_choice[]" value="english"><span class="float_span"><?php _e('English', 'webfactor'); ?></span>
                <br>
                <br>
                <br>
                <p><?php _e('Choose <strong>only one type of lesson</strong> per week. Please indicate the level below.', 'webfactor'); ?></p>
                <br>
                <table>
                    <tr>
                        <td></td>
                        <td><?php _e('Spoken', 'webfactor'); ?>*</td>
                        <td><?php _e('Written', 'webfactor'); ?>*</td>
                    </tr>
                    <tr>
                        <td><?php _e('Never studied', 'webfactor'); ?></td>
                        <td><input type="radio" name="level_spoken" value="never_studied"></td>
                        <td><input type="radio" name="level_written" value="never_studied"></td>
                    </tr>
                    <tr>
                        <td><?php _e('1 year', 'webfactor'); ?></td>
                        <td><input type="radio" name="level_spoken" value="one_year"></td>
                        <td><input type="radio" name="level_written" value="one_year"></td>
                    </tr>
                    <tr>
                        <td><?php _e('2 years', 'webfactor'); ?></td>
                        <td><input type="radio" name="level_spoken" value="two_years"></td>
                        <td><input type="radio" name="level_written" value="two_years"></td>
                    </tr>
                    <tr>
                        <td><?php _e('3 years', 'webfactor'); ?></td>
                        <td><input type="radio" name="level_spoken" value="three_years"></td>
                        <td><input type="radio" name="level_written" value="three_years"></td>
                    </tr>
                    <tr>
                        <td><?php _e('+4 years', 'webfactor'); ?></td>
                        <td><input type="radio" name="level_spoken" value="more_then_four_years"></td>
                        <td><input type="radio" name="level_written" value="more_then_four_years"></td>
                    </tr>
                </table>

                <h2><?php _e('Dates of the stay', 'webfactor'); ?>*</h2>
                <p><?php _e('From 1 to 5 weeks between July 1<sup>st</sup> and August 4<sup>th</sup> 2018. Arrivals on Sundays and departures on Saturdays.', 'webfactor'); ?></p>

                <input type="checkbox" name="dates_stay[]" value="week1"><span class="float_span">28.06.2020 - 04.07.2020</span><br>
                <input type="checkbox" name="dates_stay[]" value="week2"><span class="float_span">05.07.2020 - 11.07.2020</span><br>
                <input type="checkbox" name="dates_stay[]" value="week3"><span class="float_span">12.07.2020 - 18.07.2020</span><br>
                <input type="checkbox" name="dates_stay[]" value="week4"><span class="float_span">19.07.2020 - 25.07.2020</span><br>
                <input type="checkbox" name="dates_stay[]" value="week5"><span class="float_span">26.07.2020 - 01.08.2020</span><br>
                <input type="checkbox" name="dates_stay[]" value="delf"><span class="float_span">05.07.2020 - 01.08.2020 <?php _e('(DELF preparation)', 'webfactor'); ?></span><br>
                <input type="checkbox" name="dates_stay[]" value="cambridge"><span class="float_span">05.07.2020 - 01.08.2020 <?php _e('(Cambridge preparation)', 'webfactor'); ?></span>

            </div>

        </div>

        <hr>

        <div class="row">
            <div class="col-sm-6">
                <h2><?php _e('Price', 'webfactor'); ?></h2>
                <table>
                    <tr>
                        <td><?php _e('1 week', 'webfactor'); ?></td>
                        <td>CHF 1'900.-</td>
                    </tr>
                    <tr>
                        <td><?php _e('2 weeks', 'webfactor'); ?></td>
                        <td>CHF 3'800.-</td>
                    </tr>
                    <tr>
                        <td><?php _e('3 weeks', 'webfactor'); ?></td>
                        <td>CHF 5'520.-</td>
                    </tr>
                    <tr>
                        <td><?php _e('4 weeks', 'webfactor'); ?></td>
                        <td>CHF 7'040.-</td>
                    </tr>
                    <tr>
                        <td><?php _e('5 weeks', 'webfactor'); ?></td>
                        <td>CHF 8'500.-</td>
                    </tr>
                </table>

                <h2><?php _e('The price includes :', 'webfactor'); ?></h2>
                <ul>
                    <li><?php _e('Full board', 'webfactor'); ?></li>
                    <li><?php _e('Twenty-two lesson periods a week', 'webfactor'); ?></li>
                    <li><?php _e('All activities proposed during the rest of the day', 'webfactor'); ?></li>
                </ul>
                <h2><?php _e('Not included :', 'webfactor'); ?></h2>
                <ul>
                    <li><?php _e('<strong>Visas :</strong> DHL shipment fees related to the invitation letter for the visa obtention', 'webfactor'); ?></li>
                    <li><?php _e('<strong>Transportation :</strong> see related point', 'webfactor'); ?></li>
                    <li><?php _e('<strong>Insurances :</strong> see related point', 'webfactor'); ?></li>
                    <li><?php _e('<strong>Hit of the week-end :</strong> see related point', 'webfactor'); ?></li>
                    <li><?php _e('<strong>Optional activities :</strong> see related point', 'webfactor'); ?></li>
                </ul>

                <h2><?php _e('Optional Activities', 'webfactor'); ?></h2>
                <ul>
                    <li><?php _e('<strong>Paragliding :</strong> CHF 120.-/flight', 'webfactor'); ?></li>
                    <li><?php _e('<strong>Tennis court rental :</strong> CHF 10.-/hour/person', 'webfactor'); ?></li>
                    <li><?php _e('<strong>Tennis lessons :</strong> CHF 80.-/hour (private lessons)', 'webfactor'); ?></li>
                    <li><strong><?php _e('Horse riding', 'webfactor'); ?> :</strong>
                        <ul>
                            <li><?php _e('Lunge : CHF 35.-/half hour', 'webfactor'); ?></li>
                            <li><?php _e('Ride : CHF 38.-/hour (only for experienced pupils)', 'webfactor'); ?></li>
                        </ul>
                    </li>
                </ul>
                <p><?php _e('These activities can be organised during the free time only.', 'webfactor'); ?></p>

                <h2><?php _e('Transportation', 'webfactor'); ?>*</h2>
                <input type="radio" name="transportation" value="none"><span><?php _e('On my own', 'webfactor'); ?></span>
                <input type="radio" name="transportation" value="gcg"><span><?php _e('Geneva - Champéry - Geneva', 'webfactor'); ?>&dagger;</span>
                <p>&dagger;<?php _e('<em>Price per person : CHF 490.-</em>', 'webfactor'); ?></p>
                <p>&dagger;<?php _e('<em>Group rates upon request</em>', 'webfactor'); ?></p>

            </div>





            <div class="col-sm-6">
                <h2><?php _e('DELF preparation / Cambridge preparation', 'webfactor'); ?></h2>
                <p><?php _e('See the related document attached', 'webfactor'); ?></p>

                <h2><?php _e('Hit of the week-end', 'webfactor'); ?>*</h2>
                <input type="radio" name="hit_we" value="enrol"><span><?php _e('We enroll', 'webfactor'); ?></span>
                <input type="radio" name="hit_we" value="dont_enrol"><span><?php _e('We do not enroll', 'webfactor'); ?></span>
                <p><?php _e('our child to the weekend at Europa-Park in Germany at the price of CHF 390.-', 'webfactor'); ?></p>
                <p>&dagger;<?php _e('<em>subject to a minimum of 10 pupils</em>', 'webfactor'); ?></p>
                <p><?php _e('The persons who take part to this weekend have to make sure before their arrival in Switzerland that their passeport and visa allow them to enter Germany.', 'webfactor'); ?></p>

                <h2><?php _e('Insurances', 'webfactor'); ?>*</h2>
                <input type="radio" name="insurance" value="buy"><span class="float_span"><?php _e('Health and accident insurance, compulsory for residents out of EU/EEA/Switzerland, at CHF 150.-/week (franchise/excess of CHF 0.-)', 'webfactor'); ?></span>
                <p><?php _e('Only for residents of Switzerland/EU/EEA :', 'webfactor'); ?></p>
                <input type="radio" name="insurance" value="own"><span class="float_span"><?php _e('My own insurance (name + please send us a certificate)', 'webfactor'); ?></span>
                <div class="row">
                    <div class="col-sm-6"><label for="insurance_name"><?php _e('Name', 'webfactor'); ?></label><input type="text" name="insurance_name"></div>

                    <div class="col-sm-6"><label for="insurance_attestation"><?php _e('Certificate', 'webfactor'); ?></label><br><input style="margin-top:13px" type="file" name="insurance_attestation"></div>
                </div>

                <h2><?php _e('Remark', 'webfactor'); ?></h2>
                <p><?php _e('How did you hear about the summer camp?', 'webfactor'); ?></p>
                <input type="checkbox" name="hear_about_summer_camp[]" value="website"> <span class="float_span"><?php _e("Ecole Nouvelle's website", 'webfactor'); ?></span>
                <div class="row">
                    <div class="col-sm-6"><input type="checkbox" name="hear_about_summer_camp[]" value="friends"> <span class="float_span"><?php _e('Friends', 'webfactor'); ?></span></div>
                    <div class="col-sm-6"><input style="margin-top:-20px; height: 30px;" type="text" name="friends_recommendation"></div>
                </div>
                <input type="checkbox" name="hear_about_summer_camp[]" value="brochure"> <span class="float_span"><?php _e('Summer Camp brochure', 'webfactor'); ?></span>
                <div class="row">
                    <div class="col-sm-6"><input type="checkbox" name="hear_about_summer_camp[]" value="agency"> <span class="float_span"><?php _e('Agency', 'webfactor'); ?></span></div>
                    <div class="col-sm-6"><input style="margin-top:-20px; height: 30px;" type="text" name="agency_recommendation"></div>
                </div>
                <div class="row">
                    <div class="col-sm-6"><input type="checkbox" name="hear_about_summer_camp[]" value="other"> <span class="float_span"><?php _e('Other', 'webfactor'); ?></span></div>
                    <div class="col-sm-6"><input style="margin-top:-20px; height: 30px;" type="text" name="other_recommendation"></div>
                </div>


                <div class="row" style="margin-top:50px;">
                    <div class="col-sm-6"><label for="place_date"><?php _e('Place and date', 'webfactor'); ?>*</label> </div>
                    <div class="col-sm-6"><input type="text" name="place_date"></div>
                </div>
                <div style="margin-top:30px;">
                    <input type="checkbox" name="terms"><span class="float_span"><?php _e('We acknowledge having read <a href="https://webfactor.ch/projets/ensrsummercamp/wp-content/uploads/2017/09/summer_camp_general_conditions.pdf" target="_blank">the general conditions</a> and accepting them.', 'webfactor'); ?>*</span>
                </div>
                <input type="hidden" name="action" value="application_form">
                <input type="hidden" name="current_language" value="<?php echo ICL_LANGUAGE_CODE; ?>">
                <div>
                    <!-- <div class="g-recaptcha" data-sitekey="6LfyYWAUAAAAAIQ7eL1VMOntNDWS0ljUNLDPPlrP"></div>  V2 -->
                </div>
                <div id="application_submit_button_outer">
                    <input id="application_submit_button" type="submit" value="<?php _e('Submit', 'webfactor'); ?>">
                </div>

                <p id="form_submit_warning"><?php _e('Please fill in all fields with a * before submitting the form', 'webfactor'); ?></p>

            </div>
        </div>



    </form>
</div>