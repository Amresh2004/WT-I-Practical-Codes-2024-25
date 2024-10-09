<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
    </style>
</head>
<body>

<h2>Student Data</h2>

<table>
    <tr>
        <th>Roll No</th>
        <th>Name</th>
        <th>OS</th>
        <th>WT</th>
        <th>DS</th>
        <th>Python</th>
        <th>Java</th>
        <th>CN</th>
        <th>Total Marks</th>
        <th>Percentage</th>
    </tr>

    <?php
    $file = fopen("student.dat", "r");
    if ($file) {
        while (($line = fgets($file)) !== false) {
            $data = explode(",", trim($line));
            $rollNo = $data[0];
            $name = $data[1];
            $marks = array_slice($data, 2);
            $totalMarks = array_sum($marks);
            $percentage = ($totalMarks / (count($marks) * 100)) * 100;

            echo "<tr>
                    <td>$rollNo</td>
                    <td>$name</td>
                    <td>{$marks[0]}</td>
                    <td>{$marks[1]}</td>
                    <td>{$marks[2]}</td>
                    <td>{$marks[3]}</td>
                    <td>{$marks[4]}</td>
                    <td>{$marks[5]}</td>
                    <td>$totalMarks</td>
                    <td>" . number_format($percentage, 2) . "%</td>
                  </tr>";
        }
        fclose($file);
    } else {
        echo "<tr><td colspan='10'>Unable to open file!</td></tr>";
    }
    ?>
</table>

</body>
</html>
