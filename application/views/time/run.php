<?php
    // if(intval($this->session->userdata('zone')) == 0){
    //     $sign = '';    
    // } else if (intval($this->session->userdata('zone')) == 1){
    //     $sign = '.';
    // } else {
    //     $sign = '..';
    // }
?>
<h4>
	Run Time : 
	<font color="blue" id="time">00:00:00</font>	
</h4>

<?php
  date_default_timezone_set($this->session->userdata('timezone'));
  
  $x = date('Y-m-d H:i:s', $this->session->userdata('time_start'));
  $deadline =  date('M d, Y H:i:s', strtotime('+2 hour +00 minutes',strtotime($x)));
?>

<script> 
var countDownDate = new Date("<?= $deadline ?>").getTime();
 
var x = setInterval(function() {

  var now = new Date().getTime();

  var distance = countDownDate - now;

  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  document.getElementById("time").innerHTML = hours + ":"+ minutes + ":" + seconds + " ";

  if (distance < 0) {
    clearInterval(x);
    window.location.assign("<?= base_url() ?>simulation/report");
  }
}, 1000);
</script>