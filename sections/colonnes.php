<?php $column_count =  sizeof(  get_sub_field('columns')  ); ?>
<?php $column_class = count_to_bootstrap_class($column_count); ?>


<div class="container">
	<div class="row">
	<?php while ( have_rows('columns') ) : the_row(); ?>
		<div class="<?php echo $column_class; ?>">
		<div style="padding:0 25px">
			<?php echo get_sub_field('content'); ?>
		</div>
		</div>
	<?php endwhile; ?>
	</div> <!-- END OF ROW -->


	<form class="" action="index.html" method="post">
	  <div class="row">
	    <div class="col-sm-6">
	      <h2>Personal Information</h2>

	      <div class="row">
	        <div class="col-sm-6"><label for="first_name">First Name</label> </div>
	        <div class="col-sm-6"><input type="text" name="first_name"></div>
	      </div>

	      <div class="row">
	        <div class="col-sm-6"><label for="last_name">Last Name</label> </div>
	        <div class="col-sm-6"><input type="text" name="last_name"></div>
	      </div>

	      <div class="row">
	        <div class="col-sm-6"><label for="birth_date">Birth Date</label> </div>
	        <div class="col-sm-6"><input type="date" name="birth_date"></div>
	      </div>

	      <div class="row">
	        <div class="col-sm-6"><label for="sex">Sex</label> </div>
	        <div class="col-sm-6" style="padding-top:15px;"><input type="radio" name="sex" value="male"><span>Male</span><input type="radio" name="sex" value="female"><span>Female</span> </div>
	      </div>

	      <div class="row">
	        <div class="col-sm-6"><label for="nationality">Nationality</label> </div>
	        <div class="col-sm-6"><input type="text" name="nationality"></div>
	      </div>

	      <div class="row">
	        <div class="col-sm-6"><label for="passport_number">Passport No.</label> </div>
	        <div class="col-sm-6"><input type="text" name="passport_number"></div>
	      </div>

	      <div class="row">
	        <div class="col-sm-6"><label for="valid_until">Valid until</label> </div>
	        <div class="col-sm-6"><input type="text" name="valid_until"></div>
	      </div>

	      <div class="row">
	        <div class="col-sm-6"><label for="mother_tongue">Mother tongue</label> </div>
	        <div class="col-sm-6"><input type="text" name="mother_tongue"></div>
	      </div>

	      <div class="row">
	        <div class="col-sm-6"><label for="school_name_address">Name and address of your child's school</label> </div>
	        <div class="col-sm-6"><textarea name="school_name_address" cols="30" rows="4"></textarea></div>
	      </div>

	      <div class="row">
	        <div class="col-sm-6"><label for="class_grade">Class, grade</label> </div>
	        <div class="col-sm-6"><input type="text" name="class_grade"></div>
	      </div>

	      <div class="row">
	        <div class="col-sm-6"><label for="representative">Name of parents or legal representative</label> </div>
	        <div class="col-sm-6"><textarea name="representative"  cols="30" rows="4"></textarea></div>
	      </div>

	      <div class="row">
	        <div class="col-sm-6"><label for="address">Private address</label> </div>
	        <div class="col-sm-6"><input type="text" name="address"></div>
	      </div>

	      <div class="row">
	        <div class="col-sm-6"><label for="city_country">City / Country</label> </div>
	        <div class="col-sm-6"><input type="text" name="city_country"></div>
	      </div>

	      <div class="row">
	        <div class="col-sm-6"><label for="email">Email</label> </div>
	        <div class="col-sm-6"><input type="email" name="email"></div>
	      </div>

	      <div class="row">
	        <div class="col-sm-6"><label for="phone">Phone</label> </div>
	        <div class="col-sm-6"><input type="text" name="phone"></div>
	      </div>

	      <div class="row">
	        <div class="col-sm-6"><label for="mobile_phone">Mobile phone</label> </div>
	        <div class="col-sm-6"><input type="text" name="mobile_phone"></div>
	      </div>

	      <div class="row">
	        <div class="col-sm-6"><label for="fax">Fax</label> </div>
	        <div class="col-sm-6"><input type="text" name="fax"></div>
	      </div>

	    </div>

	    <div class="col-sm-6">
	      <h2>Target audience</h2>
	      <p>Boys and girls from <strong>9 to 18 years of age.</strong></p>
	      <p><strong>Passport photo</strong></p> <br>
				<input type="file" name="photo">


	      <h2>Choice of lessons</h2>
	      <input type="checkbox" name="lesson_choice" value="delf_a1"><span class="float_span">Preparation DELF - level A1</span><br>
	      <input type="checkbox" name="lesson_choice" value="delf_a2"><span class="float_span">Preparation DELF - level A2</span><br>
	      <input type="checkbox" name="lesson_choice" value="cambridge_a1"><span class="float_span">Preparation Cambridge - level A1</span><br>
	      <input type="checkbox" name="lesson_choice" value="cambridge_a2"><span class="float_span">Preparation Cambridge - level A2</span><br>
	      <input type="checkbox" name="lesson_choice" value="french"><span class="float_span">French</span><br>
	      <input type="checkbox" name="lesson_choice" value="english"><span class="float_span">English</span>
				<br>
				<br>
				<br>
	      <p>Choose <strong>only one type of lesson</strong> per week. Please indicate the level below.</p>
				<br>
	      <table>
	        <tr>
	          <td></td>
	          <td>Spoken</td>
	          <td>Written</td>
	        </tr>
	        <tr>
	          <td>Never studied</td>
	          <td><input type="radio" name="level_spoken" value="never_studied"></td>
	          <td><input type="radio" name="level_written" value="never_studied"></td>
	        </tr>
	        <tr>
	          <td>1 year</td>
	          <td><input type="radio" name="level_spoken" value="one_year"></td>
	          <td><input type="radio" name="level_written" value="one_year"></td>
	        </tr>
	        <tr>
	          <td>2 years</td>
	          <td><input type="radio" name="level_spoken" value="two_years"></td>
	          <td><input type="radio" name="level_written" value="two_years"></td>
	        </tr>
	        <tr>
	          <td>3 years</td>
	          <td><input type="radio" name="level_spoken" value="three_years"></td>
	          <td><input type="radio" name="level_written" value="three_years"></td>
	        </tr>
	        <tr>
	          <td>+4 years</td>
	          <td><input type="radio" name="level_spoken" value="more_then_four_years"></td>
	          <td><input type="radio" name="level_written" value="more_then_four_years"></td>
	        </tr>
	      </table>

	      <h2>Dates of the stay</h2>
	      <p>From 1 to 5 weeks between July 1<sup>st</sup> and August 4<sup>th</sup> 2018. Arrivals on Sundays and departures on Saturdays.</p>

	      <input type="radio" name="dates_stay" value="week1"><span class="float_span">01.07.2018 - 07.07.2018</span><br>
	      <input type="radio" name="dates_stay" value="week2"><span class="float_span">08.07.2018 - 14.07.2018</span><br>
	      <input type="radio" name="dates_stay" value="week3"><span class="float_span">15.07.2018 - 21.07.2018</span><br>
	      <input type="radio" name="dates_stay" value="week4"><span class="float_span">22.07.2018 - 28.07.2018</span><br>
	      <input type="radio" name="dates_stay" value="week5"><span class="float_span">29.07.2018 - 04.08.2018</span><br>
	      <input type="radio" name="dates_stay" value="delf"><span class="float_span">08.07.2018 - 04.08.2018 (DELF preparation)</span><br>
	      <input type="radio" name="dates_stay" value="cambrdidge"><span class="float_span">08.07.2018 - 04.08.2018 (Cambridge preparation)</span>

	      </div>

	    </div>

	    <hr>

	    <div class="row">
	      <div class="col-sm-6">
	        <h2>Price</h2>
	        <table>
	          <tr>
	            <td>1 week</td>
	            <td>CHF 1'850.-</td>
	          </tr>
	          <tr>
	            <td>2 weeks</td>
	            <td>CHF 3'700.-</td>
	          </tr>
	          <tr>
	            <td>3 weeks</td>
	            <td>CHF 5'370.-</td>
	          </tr>
	          <tr>
	            <td>4 weeks</td>
	            <td>CHF 6'840.-</td>
	          </tr>
	          <tr>
	            <td>5 weeks</td>
	            <td>CHF 8'250.-</td>
	          </tr>
	        </table>

	        <h2>The price includes :</h2>
	        <ul>
	          <li>Full board</li>
	          <li>Twenty-two lesson periods a week</li>
	          <li>All activities proposed during the rest of the day</li>
	        </ul>
	        <h2>Not included :</h2>
	        <ul>
	          <li><strong>Visas :</strong> DHL shipment fees related to the invitation letter for the visa obtention</li>
	          <li><strong>Transportation :</strong> see related point</li>
	          <li><strong>Insurances :</strong> see related point</li>
	          <li><strong>Hit of the week-end :</strong> see related point</li>
	          <li><strong>Optional activities :</strong> see related point</li>
	        </ul>

	        <h2>Optional Activities</h2>
	        <ul>
	          <li><strong>Paragliding :</strong> CHF 120.-/flight</li>
	          <li><strong>Tennis court rental :</strong> CHF 10.-/hour/person</li>
	          <li><strong>Tennis lessons :</strong> CHF 80.-/hour (private lessons)</li>
	          <li><strong>Horse riding :</strong>
	            <ul>
	              <li>Lunge : CHF 35.-/half hour</li>
	              <li>Ride : CHF 38.-/hour (only for experienced pupils)</li>
	            </ul>
	          </li>
	        </ul>
	        <p>These activities can be organised during the free time only.</p>

	        <h2>Transportation</h2>
	        <input type="radio" name="transportation" value="none"><span>On my own</span>
	        <input type="radio" name="transportation" value="gcg"><span>Geneva - Champéry - Geneva*</span>
	        <p><em>*Price per person : CHF 490.-</em></p>
	        <p><em>*Group rates upon request</em></p>

	      </div>



	      <div class="col-sm-6">
	        <h2>DELF preparation / Cambridge preparation</h2>
	        <p>See the related document attached</p>

	        <h2>Hit of the week-end</h2>
	        <input type="radio" name="hit_we" value="enrol"><span>We enrol</span>
	        <input type="radio" name="hit_we" value="dont_enrol"><span>We do not enrol</span>
	        <p>our child to the weekend at Europa-Park in Germany at the price of CHF 390.-</p>
	        <p><em>*subject to a minimum of 10 pupils</em></p>
	        <p>The persons who take part to this weekend have to make sure before their arrival in Switzerland that their passeport and visa allow them to enter Germany.</p>

	        <h2>Insurances</h2>
	        <input type="radio" name="insurance" value="buy"><span class="float_span">Health and accident insurance, compulsory for residents out of EU/EEA/Switzerland, at CHF 150.-/week (franchise/excess of CHF 0.-)</span>
	        <p>Only for residents of Switzerland/EU/EEA :</p>
	        <input type="radio" name="insurance" value="own"><span class="float_span">My own insurance (name + please send us a certificate)</span>
	        <div class="row">
	          <div class="col-sm-6"><label for="insurance_name">Name</label><input type="text" name="insurance_name"></div>

	          <div class="col-sm-6"><label for="insurance_attestation">Certificate</label><br><input style="margin-top:13px" type="file" name="insurance_attestation"></div>
	        </div>

	        <h2>Remark</h2>
	        <p>How did you hear about the summer camp?</p>
	        <input type="checkbox" name="hear_about_summer_camp" value="website"> <span class="float_span">Ecole Nouvelle's website</span>
	        <div class="row">
	          <div class="col-sm-6"><input type="checkbox" name="hear_about_summer_camp" value="friends"> <span class="float_span">Friends</span></div>
	          <div class="col-sm-6"><input style="margin-top:-20px; height: 30px;" type="text" name="friends_recommendation"></div>
	        </div>
	        <input type="checkbox" name="hear_about_summer_camp" value="brochure"> <span class="float_span">Summer Camp brochure</span>
	        <div class="row">
	          <div class="col-sm-6"><input type="checkbox" name="hear_about_summer_camp" value="agency"> <span class="float_span">Agency</span></div>
	          <div class="col-sm-6"><input style="margin-top:-20px; height: 30px;" type="text" name="agency_recommendation"></div>
	        </div>
	        <div class="row">
	          <div class="col-sm-6"><input type="checkbox" name="hear_about_summer_camp" value="other"> <span class="float_span">Other</span></div>
	          <div class="col-sm-6"><input style="margin-top:-20px; height: 30px;" type="text" name="other_recommendation"></div>
	        </div>


	        <div class="row" style="margin-top:50px;">
	          <div class="col-sm-6"><label for="place_date">Place and date</label> </div>
	          <div class="col-sm-6"><input type="text" name="place_date"></div>
	        </div>
					<div style="margin-top:30px;">
					 	<input type="checkbox" name="terms"><span class="float_span">We acknowledge having read the general conditions and accepting them.</span>
				 </div>

	        <input type="submit" value="Submit">

	      </div>
	    </div>

	</form>



</div><!--  END OF CONTAINER -->
