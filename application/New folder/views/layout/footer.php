 <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    &copy; 2017 Your Company. Designed by <a target="_blank" href="#" title="Free Twitter Bootstrap WordPress Themes and HTML templates">ShapeBootstrap</a>
                </div>
                <div class="col-sm-6">
                    <!--<ul class="social-icons">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                        <li><a href="#"><i class="fa fa-behance"></i></a></li>
                        <li><a href="#"><i class="fa fa-flickr"></i></a></li>
                        <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-github"></i></a></li>
                    </ul>-->
                </div>
            </div>
        </div>
    </footer><!--/#footer-->

   
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="<?= base_url();?>assets/js//bootstrap.bundle.js"></script>
	<script src="<?= base_url();?>assets/js/jquery.lettering.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
<!-- 	<script type="text/javascript">
		window.players = function($elem) {
    var top = parseInt($elem.css("top"));
    var temp = -1 * $('.phone-quotes > li').height();
    if(top < temp) {
        top = $('.phone-quotes').height()
        $elem.css("top", top);
    }
    $elem.animate({ top: (parseInt(top)-70) }, 600, function () {
      window.players($(this))
    });
}
$(document).ready(function() {
    var i = 0;
    $(".phone-quotes > li").each(function () {
          $(this).css("top", i);
          i += 70;
          window.players($(this));
    });
});
	</script> -->
	<script type="text/javascript">
		$(document).ready(function(){
		    $("#testimonial-slider").owlCarousel({
		        items:1,
		        itemsDesktop:[1000,1],
		        itemsDesktopSmall:[980,1],
		        itemsTablet:[768,1],
		        itemsMobile:[650,1],
		        pagination:true,
		        navigation:false,
		        slideSpeed:1000,
		        autoPlay:true
		    });
		});
	</script>