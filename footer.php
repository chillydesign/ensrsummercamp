
	<?php $tdu = get_template_directory_uri(); ?>

    <footer>
        <div class="container">

            <div class="row">



                <div class="col-sm-6 col-md-9">

                    <div class="row">

                        <div class="col-md-6" id="ensr_col">
                            <img src="<?php echo $tdu; ?>/img/ensr_blue.jpg"  alt="">
                            <p >Chemin de Rovéréaz 20 <br> Case postale 161 <br> CH–1000 Lausanne 12 <br> Switzerland <br> <a href="http://www.ensr.ch">www.ensr.ch</a></p>


                        </div>
                        <div class="col-md-6" id="summercamp_col">
                            <img src="<?php echo $tdu; ?>/img/summer_camp_blue.jpg"  alt="">
                            <p>Hôtel Suisse  <br> Champéry, Valais <br> Switzerland  <br> <a href="http://www.ensr-summer.ch">www.ensr-summer.ch </a>    </p>
                        </div>


                    </div>

                </div>

                <div class="col-sm-6 col-md-3" id="ensr_summer_col">
									<h2>Contactez-nous</h2>
									<p>Tel: +41 21 654 65 00<br> Email : <a href="mailto:info@ensr.ch">info@ensr.ch</a></p>
									<div class="social_media">
										<a href="https://www.facebook.com/EcoleNouvelleENSR/" class="social_icon" id="facebook" target="blank">Facebook</a>
										<a href="https://www.instagram.com/ensrlife/" class="social_icon" id="instagram" target="blank">Instagram</a>
										<a href="https://www.youtube.com/channel/UCe-j7AfjiJFsSPyvlzsmVMQ" class="social_icon" id="youtube" target="blank">Youtube</a>
									</div>
                    <!-- <img src="<?php// echo $tdu; ?>/img/ensr_summer.jpg" alt=""> -->
                </div>


            </div>


        </div>

        <div id="copyright">
            <p class="container">&copy; <?php echo date('Y'); ?> Ecole Nouvelle de la Suisse Romande.  Website by <a href="https://webfactor.ch">Webfactor</a>. </p>
        </div>

    </footer>


        </main>



		<?php wp_footer(); ?>
        <?php if ( is_page('admission-fees')  ||  is_page('inscription-cout') || is_page('contact') ): ?>
        <script src='https://www.google.com/recaptcha/api.js'></script>
        <?php endif; ?>

		<script type="text/javascript" src="<?php echo $tdu; ?>/js/min/scripts.bundle.js?v=<?php echo wf_version(); ?>"></script>
		<script>
		// (function(f,i,r,e,s,h,l){i['GoogleAnalyticsObject']=s;f[s]=f[s]||function(){
		// (f[s].q=f[s].q||[]).push(arguments)},f[s].l=1*new Date();h=i.createElement(r),
		// l=i.getElementsByTagName(r)[0];h.async=1;h.src=e;l.parentNode.insertBefore(h,l)
		// })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		// ga('create', 'UA-XXXXXXXX-XX', 'yourdomain.com');
		// ga('send', 'pageview');
		</script>

	</body>
</html>
