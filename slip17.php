<!DOCTYPE html>
<html>
<?php
$people = array(
    "Amresh" => "31",
    "Shubham" => "41",
    "Mitesh" => "39",
);

asort($people);
echo "<h3>Ascending Order by Value:</h3>";
foreach($people as $key => $value) {
    echo "$key: $value<br>";
}

ksort($people);
echo "<h3>Ascending Order by Key:</h3>";
foreach($people as $key => $value) {
    echo "$key: $value<br>";
}

arsort($people);
echo "<h3>Descending Order by Value:</h3>";
foreach($people as $key => $value) {
    echo "$key: $value<br>";
}

krsort($people);
echo "<h3>Descending Order by Key:</h3>";
foreach($people as $key => $value) {
    echo "$key: $value<br>";
}
?>
</body>
</html>