<?php
	$__URP=base_url('resources/user/assets/');
?>
<!-- Footer Area section -->
<footer>

	<div class="footer-bottom">
		<div class="container">
			<div class="footer-bottom-inner">
				<div class="row">
					<div class="col-md-6 col-sm-12 footer-no-padding">
						<p>&copy; Copyright 2018 | All rights reserved</p>
					</div>
					<div class="col-md-6 col-sm-12 footer-no-padding">
						<ul class="list-unstyled footer-menu text-right">
							<li>Follow us:</li>
							<li><a href="https://www.facebook.com/Lets-Teach-585272115181298/" target="_blank"><i class="fa fa-facebook facebook"></i></a></li>
							<li><a href="https://twitter.com/let_teach" target="_blank"><i class="fa fa-twitter twitter"></i></a></li>
							<li><a href="https://www.instagram.com/_lets_teach/" target="_blank"><i class="fa fa-instagram instagram"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div><!-- ./ End footer-bottom -->		
</footer><!-- ./ End Footer Area section -->
    <!-- ============================
    JavaScript Files
    ============================= -->
<script type="text/javascript">
  $(function(){
    var tab='';
    tab=location.hash;
    if(tab!=''){
      $('[href="'+tab+'"]').trigger('click');      
    }
	history.pushState("", document.title, window.location.pathname + window.location.search);
});
</script>
	<!-- Bootstrap JS -->
	<script src="<?=$__URP?>js/assets/bootstrap.min.js"></script>
	<!-- Sticky JS -->
	<script src="<?=$__URP?>js/assets/jquery.sticky.js"></script>
	<!-- Popup -->
    <script src="<?=$__URP?>js/assets/jquery.magnific-popup.min.js"></script>
	<!-- Counter Up -->
    <script src="<?=$__URP?>js/assets/jquery.counterup.min.js"></script>
    <script src="<?=$__URP?>js/assets/waypoints.min.js"></script>
 	<!-- owl carousel -->
    <script src="<?=$__URP?>js/assets/owl.carousel.min.js"></script>
   <!-- Slick Slider-->
    <script src="<?=$__URP?>js/assets/slick.min.js"></script>
    <!-- Main Menu -->
	<script src="<?=$__URP?>js/assets/jquery.meanmenu.min.js"></script>
	<!-- Custom JS -->
	<script src="<?=$__URP?>js/custom.js"></script>


</body>

<!-- Mirrored from ecologytheme.com/theme/eduread/become-a-teacher.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 19 Apr 2018 19:49:04 GMT -->
</html>