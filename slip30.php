<?php
$c = pg_connect("host=localhost dbname=amresh user=postgres password=8624807723") or die("Cannot connect to the database");

if ($c) {
    echo "Connected";
} else {
    echo "Connection failed";
}

$cn = $_POST['cn'];

display($cn);

function display($cn)
{
    global $c;
    
    $q = "
        SELECT s.stud_id, s.name, s.class, sc.year
        FROM Student s
        JOIN Student_Competition sc ON s.stud_id = sc.stud_id
        JOIN Competition c ON sc.c_no = c.c_no
        WHERE c.c_name = '$cn' AND sc.rank = 1
    ";
    
    $r = pg_query($c, $q);
    
    if (pg_num_rows($r) > 0) {
        while ($row = pg_fetch_assoc($r)) {
            echo "<br>Student Information:<br>";
            echo "<br>Student ID: " . $row['stud_id'] . "<br>";
            echo "Name: " . $row['name'] . "<br>";
            echo "Class: " . $row['class'] . "<br>";
            echo "Year: " . $row['year'] . "<br>";
        }
    } else {
        echo "No student found with first rank in $cn.";
    }
}

pg_close($c);
?>
