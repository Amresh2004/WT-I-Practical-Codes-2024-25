<?php
$f1=$_POST['txt1'];
$f2=$_POST['txt2'];

$file1=fopen($f1,"r")or exit("cant open file");
echo "hello";
$file2=fopen($f2,"a+")or exit("cant open file");

while(!feof($file1))
{
$data=fread($file1,filesize($f1));
fwrite($file2,$data);
}
echo "file appended";
fclose($file1);
fclose($file2);
?>