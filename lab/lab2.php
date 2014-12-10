<?php
$country=array("india","pakistan");
$states=array(array("kerala","tamil"),array("kerala","tamil"));
$series=array();
for($i=0;$i<count($country);$i++){
    $series[$i]['name']=$country[$i];
     $series[$i]["data"]=$states[$i];
 }

//echo '<pre>';  echo json_encode($series); exit;
echo '<pre>'; print_r($series); exit;