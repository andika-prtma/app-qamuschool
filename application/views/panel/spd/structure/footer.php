</div>
    </div>
    <!-- jQuery -->
    <script src="<?= base_url('assets/template/gentelella/') ?>vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?= base_url('assets/template/gentelella/') ?>vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="<?= base_url('assets/template/gentelella/') ?>vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?= base_url('assets/template/gentelella/') ?>vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="<?= base_url('assets/template/gentelella/') ?>vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="<?= base_url('assets/template/gentelella/') ?>vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="<?= base_url('assets/template/gentelella/') ?>vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="<?= base_url('assets/template/gentelella/') ?>vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="<?= base_url('assets/template/gentelella/') ?>vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="<?= base_url('assets/template/gentelella/') ?>vendors/Flot/jquery.flot.js"></script>
    <script src="<?= base_url('assets/template/gentelella/') ?>vendors/Flot/jquery.flot.pie.js"></script>
    <script src="<?= base_url('assets/template/gentelella/') ?>vendors/Flot/jquery.flot.time.js"></script>
    <script src="<?= base_url('assets/template/gentelella/') ?>vendors/Flot/jquery.flot.stack.js"></script>
    <script src="<?= base_url('assets/template/gentelella/') ?>vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="<?= base_url('assets/template/gentelella/') ?>vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="<?= base_url('assets/template/gentelella/') ?>vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="<?= base_url('assets/template/gentelella/') ?>vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="<?= base_url('assets/template/gentelella/') ?>vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="<?= base_url('assets/template/gentelella/') ?>vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="<?= base_url('assets/template/gentelella/') ?>vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="<?= base_url('assets/template/gentelella/') ?>vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="<?= base_url('assets/template/gentelella/') ?>build/js/custom.min.js"></script>

                                        <!-- manual -->
    <!-- datetimepicker -->
    <script src="<?= base_url('assets/vendor/timepicker') ?>/jquery.datetimepicker.full.min.js"></script>
    <!-- select2 -->
    <script src="<?= base_url('assets/vendor/select2') ?>/js/select2.min.js"></script>

    <!-- Initialize datetimepicker -->
    <script  type="text/javascript">
        jQuery('#timedeparture').datetimepicker();
        jQuery('#timeback').datetimepicker();
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>
    <?php 
        if ($swal) {    
            $this->load->view($swal);
        }
    ?>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDK0Wk9CEkyOK4MtWPFkzvhBmxly_5TpU0&amp;libraries=places&v=3.41"></script> 
    <script type="text/javascript">
        google.maps.event.addDomListener(window, 'load', function () {
        var places = new google.maps.places.Autocomplete(document.getElementById('pickup'));
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

            $('#lat1').val(lat);
            $('#lng1').val(long);
            hitung_jarak();
        });
      });
    </script>
    <script type="text/javascript">
        google.maps.event.addDomListener(window, 'load', function () {
        var places = new google.maps.places.Autocomplete(document.getElementById('destination'));
            google.maps.event.addListener(places, 'place_changed', function () {
            var place = places.getPlace();
            var address = place.formatted_address;
            var latitudeLongitude = place.geometry.location;
            var mesg = "Address: " + address;
                mesg += "\nLatitudeLongitude: " + latitudeLongitude;

            $('#tempo2').val(latitudeLongitude);
            var ambildata = $('#tempo2').val();
            var pisah     = ambildata.split(",");
             
            var str1 = pisah[0];
            var lat = str1.replace("(", "");

            var str2 = pisah[1];
            var lon = str2.replace(")", "");

            var str3 = lon;
            var long = str3.replace(" ", "");

            $('#lat2').val(lat);
            $('#lng2').val(long);
            hitung_jarak();
        });
      });
    </script>
     <script>
        getLocation();
        var x = document.getElementById("demo");
        function getLocation() {
          if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
          } else {
            x.innerHTML = "Geolocation is not supported by this browser.";
          }
        }

        function showPosition(position) {
          //x.innerHTML = "Latitude: " + position.coords.latitude + "<br>Longitude: " + position.coords.longitude;

            $('#lat1').val(position.coords.latitude);
            $('#lng1').val(position.coords.longitude);
            $('#lat2').val(position.coords.latitude);
            $('#lng2').val(position.coords.longitude);
            hitung_jarak();
        }
        </script> 
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <script type="text/javascript">
        
        function hitung_jarak(){
            var lat1 = document.getElementById('lat1').value;
            var lng1 = document.getElementById('lng1').value;
            var lat2 = document.getElementById('lat2').value;
            var lng2 = document.getElementById('lng2').value;
           $.ajax({
              url:'<?= base_url() ?>spd/hitung_jarak',
              type:'POST',
              async:false,
              data:{
                lat1:lat1,
                lng1:lng1,
                lat2:lat2,
                lng2:lng2,
              },
              success:function(data){
                document.getElementById('jarak').value = data+' Km';
              }
            });
        }
    </script>
  </body>
</html>