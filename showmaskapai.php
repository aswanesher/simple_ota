<?php 
require_once("header.php");
$orig			= $_POST['orig'];
$dest			= $_POST['dest'];
$pecahtgl1		= explode("/", $_POST['flight_date']);
$pecahtgl2		= explode("/", $_POST['return_date']);
$flight_date 	= $pecahtgl1[2].$pecahtgl1[1].$pecahtgl1[0];
$return_date 	= $pecahtgl2[2].$pecahtgl2[1].$pecahtgl2[0];
$transit=0;
if (isset($_POST['transit']) ){
    $transit = 1;
}
$way = $_POST['way'];
?>
<body>
<p class="links"><a href="index.php" class="selected">Main Form</a> | <a href="detail.php">Detail Form</a> |<a href="account.php">Account Form</a> | <a href="payment.php">Payment Form</a></p>
<div class="tabbed-area">
  <div class="box-wrap">
    <div id="box-one">

      <!-- MASUKKAN DATA -->
      <?php 
       //	$url = "http://ws.demo.awan.sqiva.com/?rqid=5EB9FE68-8915-11E0-BEA0-C9892766ECF2&airline_code=&app=information&action=get_schedule&org=".$orig."&des=".$dest."&flight_date=".$flight_date."&return_flight=1&ret_flight_date=".$return_date."&extra_days=1";
	/*	
        $jsonUrl = file_get_contents($url, False);
		$json_idr = json_decode($jsonUrl, true);
		//var_dump($json_idr);
		echo "Jadwal Keberangkatan<br>";
		foreach ($json_idr['schedule'] as $myd) {
    		echo $myd[0].",".$myd[1].",".$myd[2].",".$myd[3].",".$myd[4].",".$myd[5].",".$myd[6].",".$myd[7]."<br>";
		}
		echo "Jadwal Kembali<br>";
		foreach ($json_idr['ret_schedule'] as $myd1) {
    		echo $myd1[0].",".$myd1[1].",".$myd1[2].",".$myd1[3].",".$myd1[4].",".$myd1[5].",".$myd1[6].",".$myd1[7]."<br>";
		}
         * 
         */
      if ($way == 1) {
          if($transit == 0) {
              $url = "http://ws.demo.awan.sqiva.com/?rqid=5EB9FE68-8915-11E0-BEA0-C9892766ECF2&airline_code=&app=information&action=get_schedule&org=".$orig."&des=".$dest."&flight_date=".$flight_date."&return_flight=1&ret_flight_date=".$return_date."&extra_days=1";
        $jsonUrl = file_get_contents($url, False);
		$json_idr = json_decode($jsonUrl, true);
                echo "Origin = ". $json_idr['org']."</br>";
echo "Destination = ".$json_idr['des']."</br>";
echo "Flight Date = ".$json_idr['flight_date']."</br>";
echo "Extra Days = ".$json_idr['extra_days']."</br>";
echo 'SCHEDLUE : '."</br>";
?>
     	<table id="dg" >
	
			<tr>
				<th  width="50">Pesawat</th>
				<th  width="50">Take</th>
                                <th  width="50">Landing</th>
                                <th  width="50">Ava Sub Class</th>
			</tr>                   
                        <?php
foreach ($json_idr['schedule'] as $value) {
 echo'<tr> <td>';
 echo "$value[0]";
 echo '</td><td>';
 echo "$value[3]";
 echo '</td><td>';
 echo "$value[4]";
 echo '</td><td>';
  foreach ($value[8] as $val) {
     echo $val[0];
     echo $val[1];
     echo ',';
 }
 echo'</td></tr>';
}
echo '</table>';

echo '</br>';
echo "Return Flight Date : ".$json_idr['ret_flight_date']."</br>";
echo "Return Schedule : ";

?>
     	<table id="dg_" >
	
			<tr>
				<th  width="50">Pesawat</th>
				<th  width="50">Take</th>
                                <th  width="50">Landing</th>
                                <th  width="50">Ava Sub Class</th>
			</tr>                   
                        <?php
foreach ($json_idr['ret_schedule'] as $value) {
 echo'<tr> <td>';
 echo "$value[0]";
 echo '</td><td>';
 echo "$value[3]";
 echo '</td><td>';
 echo "$value[4]";
 echo '</td><td>';
  foreach ($value[8] as $val) {
     echo $val[0];
     echo $val[1];
     echo ',';
 }
 echo'</td></tr>';
}
echo '</table>';
          }
          
$url_ = "http://ws.demo.awan.sqiva.com/?&app=information&action=get_schedule_con&org=CGK&des=UPG&flight_date=20150512&return_flight=1&ret_flight_date=20150515&extra_days=1";
                $jsonUrl_ = file_get_contents($url_, False);
$json = json_decode($jsonUrl_,true);
//print_r($json);
echo '</br>';
echo "Origin = ". $json['org']."</br>";
echo "Destination = ".$json['des']."</br>";
echo "Flight Date = ".$json['flight_date']."</br>";
echo "Extra Days = ".$json['extra_days']."</br>";
echo 'SCHEDULE : '."</br> </br>";
        ?>
                             	<table id="dg" >
	
			<tr>
				<th  width="50">Flight Number</th>
				<th  width="50">Origin</th>
                                <th  width="50">Destination</th>
                                <th  width="50">Departure date</th>
                                <th  width="50">Arrival date</th>
                                <th  width="50">Departure time</th>
                                <th  width="50">Arrival time</th>
                                <th  width="50">Route</th>
			</tr>

                        <?php
                        foreach ($json['schedule'] as $valu) {
                            foreach ($valu as $value) {
                                
                            
                            
 echo'<tr> <td>';
 echo "$value[0]";
 echo '</td><td>';
 echo "$value[1]";
 echo '</td><td>';
 echo "$value[2]";
 echo '</td><td>';
echo "$value[3]";
 echo '</td><td>';
 echo "$value[4]";
  echo '</td><td>';
 echo "$value[5]";
 echo '</td><td>';
 echo "$value[6]";
  echo '</td><td>';
 echo "$value[11]";
 echo'</td></tr>';
}
}
echo '</table>';
?>
                             	<table id="dg" >
	
			<tr>
				<th  width="50">Flight Number</th>
				<th  width="50">Origin</th>
                                <th  width="50">Destination</th>
                                <th  width="50">Departure date</th>
                                <th  width="50">Arrival date</th>
                                <th  width="50">Departure time</th>
                                <th  width="50">Arrival time</th>
                                <th  width="50">Route</th>
			</tr>

                        <?php
                        echo '</br></br>';
                        echo 'Return Schedule'.$json['ret_flight_date']."</br>";
                        echo 'Schedule : </br>';
                        foreach ($json['ret_schedule'] as $valu) {
                            foreach ($valu as $value) {
                                
                            
                            
 echo'<tr> <td>';
 echo "$value[0]";
 echo '</td><td>';
 echo "$value[1]";
 echo '</td><td>';
 echo "$value[2]";
 echo '</td><td>';
echo "$value[3]";
 echo '</td><td>';
 echo "$value[4]";
  echo '</td><td>';
 echo "$value[5]";
 echo '</td><td>';
 echo "$value[6]";
  echo '</td><td>';
 echo "$value[11]";
 echo'</td></tr>';
}
}
echo '</table>';
      }
      else {
          echo 'way 0';
          //http://ws.demo.awan.sqiva.com/?rqid=5EB9FE68-8915-11E0-BEA0-C9892766ECF2&airline_code=&app=information&action=get_schedule&org=BDO&des=CGK&flight_date=20150524&return_flight=0&ret_flight_date=&extra_days=1
      }
      ?>
    
    </div>
  </div>
</div>
</body>
<?php 
require_once("footer.php");
?>
