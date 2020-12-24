<?php
    if(intval($this->session->userdata('zone')) == 0){
        $sign = '';    
    } else if (intval($this->session->userdata('zone')) == 1){
        $sign = '.';
    } else {
        $sign = '..';
    }
?>
<h4>
	Run Time<?= $sign ?> : 
	<font color="blue" id="time">00:00:00</font>	
</h4>

<?php
    //$zone = $this->session->userdata('zone');
    //dika
    // if($zone == '0'){
    //     date_default_timezone_set("Asia/Jakarta");
    // } else if ($zone == '1'){
    //     date_default_timezone_set("Asia/Makassar");
    // } else {
    //     date_default_timezone_set("Asia/Jayapura");
    // }


    date_default_timezone_set("Asia/Jakarta");
    $login     = $this->session->userdata('time');

	$startTime = DATE("Y-m-d H:i:s",$login);
	if ($this->session->userdata('zone')){
        $durasi = 2+intval($this->session->userdata('zone'));	    
	}else{
	    $durasi    = 2; //Satuan JAM    
	}
	$cenvertedTime = date('M d, Y H:i:s',strtotime('+'.$durasi.' hour +0 minutes',strtotime($startTime)));
  $start = '2014-06-01 14:00:00';
  $x = date('Y-m-d H:i:s');
  $deadline =  date('M d, Y H:i:s', strtotime('+1 hour +20 minutes',strtotime($start)));
?>

<script> 
var countDownDate = new Date("M d, Y H:i:s").getTime();
 
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
    window.location.assign("<?= base_url() ?>section/hasil");
  }
}, 1000);
</script>