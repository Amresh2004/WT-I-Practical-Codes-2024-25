<?php
$a=array('1'=>'Amresh','2'=>'shubham','3'=>'mitesh');
$opt=$_POST['opt1'];

if($opt=='o1')
{
    echo "origonal array is<br>";
    print_r($a);
    echo"the flip elements of array<br>";
    $fp=array_flip($a);
    print_r($fp);
}
else if($opt=='o2')
{
    echo"random order elements are";
    shuffle($a);
    print_r($a);
}
if($opt=='o3')
{
    extract($a);
    echo "after converting array into variables<br>";
    echo $one." ".$two." ".$three." ".$four." ".$five;
}
else if($opt=='o4')
{
    echo"the elemnt of array with therer keys";
    print_r($a);
}
?>