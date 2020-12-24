		<a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>
		
		
		<!-- Vendor JS Files -->
		<script src="<?= base_url('assets/template/original/') ?>assets/vendor/jquery/jquery.min.js"></script>
		<script src="<?= base_url('assets/template/original/') ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script src="<?= base_url('assets/template/original/') ?>assets/vendor/jquery.easing/jquery.easing.min.js"></script>
		<!-- <script src="<?= base_url('assets/template/original/') ?>assets/vendor/php-email-form/validate.js"></script> -->
		<script src="<?= base_url('assets/template/original/') ?>assets/vendor/waypoints/jquery.waypoints.min.js"></script>
		<script src="<?= base_url('assets/template/original/') ?>assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
		<script src="<?= base_url('assets/template/original/') ?>assets/vendor/venobox/venobox.min.js"></script>
		<script src="<?= base_url('assets/template/original/') ?>assets/vendor/owl.carousel/owl.carousel.min.js"></script>
		<script src="<?= base_url('assets/template/original/') ?>assets/vendor/aos/aos.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDK0Wk9CEkyOK4MtWPFkzvhBmxly_5TpU0&amp;libraries=places&v=3.41"></script>
	    <script type="text/javascript">
	        google.maps.event.addDomListener(window, 'load', function () {
	        var places = new google.maps.places.Autocomplete(document.getElementById('alamat'));
	            google.maps.event.addListener(places, 'place_changed', function () {
	            var place = places.getPlace();
	            var address = place.formatted_address;
	            var latitudeLongitude = place.geometry.location;
	            var mesg = "Address: " + address;
	                mesg += "\nLatitudeLongitude: " + latitudeLongitude;

	            $('#tempo1').val(latitudeLongitude);
	            var ambildata = $('#tempo1').val();
	            var pisah     = ambildata.split(",");
	             
	            var str1 = pisah[0];
	            var lat = str1.replace("(", "");

	            var str2 = pisah[1];
	            var lon = str2.replace(")", "");

	            var str3 = lon;
	            var long = str3.replace(" ", "");

	            $('#lat').val(lat);
	            $('#lng').val(long);
	        });
	      });
	    </script>
	    <script type="text/javascript">
	    	function showText(){
				var answer = document.getElementById('answer');
				answer.hidden = false;
	    	}

	    </script>

		<!-- Template Main JS File -->
		<script src="<?= base_url('assets/template/original/') ?>assets/js/main.js"></script>
	</body>
</html>