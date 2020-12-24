    <script src="<?= base_url('assets/edu-theme/') ?>js/jquery-3.2.1.min.js" type="text/javascript"></script>
<!-- bootstrap js -->
<script src="<?= base_url('assets/edu-theme/') ?>js/popper.min.js" type="text/javascript"></script>

<script src="<?= base_url('assets/edu-theme/') ?>js/check.js"></script>
<script src="<?= base_url('assets/edu-theme/') ?>js/preetycheble/prettyCheckable.min.js"></script>
<script src="<?= base_url('assets/edu-theme/') ?>bootstrap4/js/bootstrap.min.js" type="text/javascript"></script>
<!-- owlcarousel js -->
<script src="<?= base_url('assets/edu-theme/') ?>js/holder.min.js" type="text/javascript"></script>
<script src="<?= base_url('assets/edu-theme/') ?>js/owl-carousel/owl.carousel.min.js" type="text/javascript"></script>
<!--internal js-->
<script src="<?= base_url('assets/edu-theme/') ?>js/owlinternal.js" type="text/javascript"></script>
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
        getLocation();
        var x = document.getElementById("demo");
        function getLocation() {
          if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
          } else {
            console.log("Geolocation is not supported by this browser.");
          }
        }
        function showPosition(position) {
          //x.innerHTML = "Latitude: " + position.coords.latitude + "<br>Longitude: " + position.coords.longitude;

            $('#lat').val(position.coords.latitude);
            $('#lng').val(position.coords.longitude);
        }
    </script>
</body>
</html>
