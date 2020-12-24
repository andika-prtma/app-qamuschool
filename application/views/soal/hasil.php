<div class="container" style="margin-top: 10%; 
  padding: 10px 10px 20px 10px;
  border: 1px solid #BFBFBF;
  background-color: white;
  box-shadow: 10px 10px 5px #aaaaaa;">
  <img src="<?= base_url()?>assets/img/logo/qamuschool-transparant2.png" width="20%;">
	<h2 align="center">Converted Score</h2>
	<table width="50%">
		<tr>
			<td><b>Name</b></td>
			<td>:</td>
			<td><?= ucwords($this->session->userdata('first_name')).' '.ucwords($this->session->userdata('last_name'))?></td>
		</tr>
		<tr>
			<td><b>Email</b></td>
			<td>:</td>
			<td><?= $this->session->userdata('email') ?></td> 
			<!--<td><?= $this->session->userdata('id') ?></td>-->
		</tr>
	</table>
	<table class="table table-striped">
	  <tbody>
	    <tr>
	      <td scope="col"><b>Listening Comprehension</b></td>
	      <td><?= $scoreListening->listening ?> </td>
	    </tr>
	    <tr>
	      <th scope="row">Structure & Written Expression</th>
		  <td><?= $scoreStructure->structure ?></td>
	    </tr>
	    <tr>
	      <th scope="row">Reading Comprehension</th>
	      <td><?= $scoreReading->reading ?></td>
	    </tr>
	    <tr>
	      <th scope="row">Total Score</th>
	      <td><?= round($skorAkhir) ?></td>
	    </tr>
	    
	  </tbody>
	</table>
	<table width="100%">
		<tr>
	    	<td>
	    		<a href="<?= base_url('calculate/backDashboard') ?>" class="btn btn-success " style="width:100%; ">Back To Dashboard</a>
	    	</td>
	    	<td>
	    		<a href="<?= base_url('simulation/explanation') ?>" class="btn btn-primary " style="width:100%; ">Kunci Jawaban</a>
	    	</td>
	    </tr>
	</table>
</div>