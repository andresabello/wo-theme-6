<div class="home-form" id="home-form">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="ac-form">
					<form action="<?= $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
						<div class="row">
							<h2>Get the help you need today, contact us now!</h2>
							<?php wp_nonce_field('ac_form_ajaxhandler','ac_form_nonce'); ?>
							<div class="col-md-6">
								<input type="text" name="ac_name" placeholder="Your Full Name">
								<input type="email" name="ac_email" placeholder="Your Email Address">
								<input type="text" name="ac_phone" placeholder="Your Phone Number">		
								<select name="ac_select">
									<option value="Seeking Treatment for">Who are you seeking treatment for?</option>
									<option value="Addicted person’s spouse / significant other">Addicted person’s spouse / significant other</option>
									<option value="Addicted person’s mother">Addicted person’s mother</option>
									<option value="Addicted person’s father">Addicted person’s father</option>
									<option value="Addicted person’s grandparent">Addicted person’s grandparent</option>
									<option value="Addicted person’s brother/sister">Addicted person’s brother/sister</option>
									<option value="Addicted person’s family">Addicted person’s family</option>
									<option value="Addicted person’s friend">Addicted person’s friend</option>
									<option value="Self">Self</option>
									<option value="Other">Other</option>
								</select>
								<input type="text" name="ac_choice" placeholder="What is your drug of choice?">
								<input type="text" name="ac_time" placeholder="How long have you been using?">
							</div>				
							<div class="col-md-6">
								<label for="ac_insurance">Do you have insurance?</label><div class="pull-left" style="margin-bottom: 20px;"><input type="radio" name="ac_insurance" id="ac_insurance" value="yes">&nbsp; Yes &nbsp; <input type="radio" name="ac_insurance" value="no"> &nbsp; No</div>
								<label for="ac_treatment">Have you been in treatment before?</label><div class="pull-left" style="margin-bottom: 20px;"><input type="radio" name="ac_treatment" id="ac_treatment" value="yes">&nbsp; Yes &nbsp; <input type="radio" name="ac_treatment" value="no"> &nbsp; No</div>				
								<textarea name="ac_message" class="widefat">How can we help you?</textarea>						
								<div class="ac-captcha"><span class="rand1"></span> + <span class="rand2"></span> = <input type="text" id="total"></div>
								<!-- Submit -->
								<button class="ac-submit" name="ac-submit" type="submit">Take the First Step</button>
								<p class="info">Your <a href="<?= home_url();?>/privacy-policy/">privacy</a> is important to us. All information is confidential.</p>
							</div>
						</div>
					</form>		
				</div>				
			</div>
		</div>
	</div>
</div>