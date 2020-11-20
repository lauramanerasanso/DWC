<?php
$n1=intval($_REQUEST['num1']);
$n2=intval($_REQUEST['num2']);
$type=intval($_REQUEST['tipus']);

if($type === 1){
    $data = $n1 + $n2;
    echo $data;   
}else if($type === 2){
    $data = $n1 - $n2;
    echo $data;
}else if($type === 3){
    $data = $n1 * $n2;
    echo $data;
}else if($type === 4){
    $data = $n1 / $n2;
    echo $data;
}

?>