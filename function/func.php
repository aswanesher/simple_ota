<?php
function get_fare($ad,$ch,$in,$org,$des,$fd,$fn,$rfd,$rfn,$rf,$arrai,$act) {
    $url = "http://ws.demo.awan.sqiva.com/?rqid=5EB9FE68-8915-11E0-BEA0-C9892766ECF2&app=information&action=".$act."&org=".$org."&des=".$des."&flight_date=".$fd."&flight_no=".$fn."&ret_flight_date=".$rfd."&ret_flight_no=".$rfn."&return_flight=".$rf."";
    $get_url=  file_get_contents($url);
    $json = json_decode($get_url,true);
 //   print_r($url);
    $harga = 0;
    if (!empty($json[$arrai])) {
        $harga = ( ($json[$arrai][0][1]*$ad) + ($json[$arrai][0][2]*$ch) + ($json[$arrai][0][3]*$in) );
    }
    return $harga;
}

function get_ret_fare($ad,$ch,$in,$org,$des,$fd,$fn) {
    $url = "http://ws.demo.awan.sqiva.com/?rqid=5EB9FE68-8915-11E0-BEA0-C9892766ECF2&app=information&action=get_fare&org=".$org."&des=".$des."&flight_date=".$fd."&flight_no=".$fn."&ret_flight_date=&ret_flight_no=&return_flight=0";
    $get_url=  file_get_contents($url);
    $json = json_decode($get_url,true);
 //   print_r($url);
    $harga = 0;
    if (!empty($json['fare_info'])) {
        $harga = ( ($json['fare_info'][0][1]*$ad) + ($json['fare_info'][0][2]*$ch) + ($json['fare_info'][0][3]*$in) );
    }
    return $harga;
}
?> 