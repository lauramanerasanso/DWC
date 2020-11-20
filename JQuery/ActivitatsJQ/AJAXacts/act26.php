<?php
header("Content-Type: application/json; charset=UTF-8");
$name='';
$age='';
$city='';
if ($_REQUEST['city']=='MONTUIRI'){
    $name='Laura';
    $age='21';
    $city='MONTUÏRI';


} else if ($_REQUEST['city']=='SANT JOAN'){
    $name='Montse';
    $age='59';
    $city='SANT JOAN';

} else if ($_REQUEST['city']=='VILAFRANCA'){
    $name='Guida';
    $age='16';
    $city='VILAFRANCA';

} else if ($_REQUEST['city']=='MANACOR'){
    $name='';
    $age='';
    $city='';
}
echo '{"name":"'.$name.'","firstName":"'.$firstName.'","address":"'.$address.'"}';
?>