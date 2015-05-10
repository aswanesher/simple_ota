<?php 
require_once("header.php");
$orig			= $_POST['orig'];
$dest			= $_POST['dest'];
$pecahtgl1		= explode("/", $_POST['flight_date']);
$pecahtgl2		= explode("/", $_POST['return_date']);
$flight_date 	= $pecahtgl1[2].$pecahtgl1[1].$pecahtgl1[0];
$return_date 	= $pecahtgl2[2].$pecahtgl2[1].$pecahtgl2[0];
?>
<body>
<p class="links"><a href="index.php" class="selected">Main Form</a> | <a href="detail.php">Detail Form</a> |<a href="account.php">Account Form</a> | <a href="payment.php">Payment Form</a></p>
<div class="tabbed-area">
  <div class="box-wrap">
    <div id="box-one">

      <!-- MASUKKAN DATA -->
      <?php 
       	$url = "http://ws.demo.awan.sqiva.com/?rqid=5EB9FE68-8915-11E0-BEA0-C9892766ECF2&airline_code=&app=information&action=get_schedule&org=".$orig."&des=".$dest."&flight_date=".$flight_date."&return_flight=1&ret_flight_date=".$return_date."&extra_days=1";
		$jsonUrl = file_get_contents($url, False);
		$json_idr = json_decode($jsonUrl, true);
		//var_dump($json_idr);
		foreach ($json_idr['schedule'] as $myd) {
    		echo $myd[0].",".$myd[1].",".$myd[2].",".$myd[3].",".$myd[4].",".$myd[5].",".$myd[6].",".$myd[7]."<br>";
		}
      ?>
    
    </div>
  </div>
</div>
</body>
<?php 
require_once("footer.php");
?>
