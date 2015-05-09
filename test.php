 <?php 

 $url = file_get_contents("http://ws.demo.awan.sqiva.com/?rqid=5EB9FE68-8915-11E0-BEA0-C9892766ECF2&airline_code=W2&app=data&action=get_org");

 $arr = json_decode($url);

 //print_r($arr->origin);

 foreach($arr->origin as $data) {

 print_r($data);
 }

 ?>