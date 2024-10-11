<?php

$conn = pg_connect("host=localhost port=5432 dbname=amresh user=postgres password=8624807723");

if (!$conn) 
{
    echo "An error occurred during the connection.";
} 
else 
{
    echo "Connection successful!<br>";

    $a = $_POST['t1'];

    $query = "SELECT dno, dname, dadd, dcity, darea 
              FROM doct 
              INNER JOIN hosp ON hosp.hno = doct.hno1 
              WHERE hosp.hname = $1";

    $result = pg_query_params($conn, $query, array($a));

    if ($result) 
    {
        echo "<table border='3'>
                <tr>
                    <th>d_no</th>
                    <th>d_name</th>
                    <th>d_address</th>
                    <th>d_city</th>
                    <th>area</th>
                </tr>";

        while ($row = pg_fetch_assoc($result)) 
        {
            echo "<tr>
                    <td>{$row['dno']}</td>
                    <td>{$row['dname']}</td>
                    <td>{$row['dadd']}</td>
                    <td>{$row['dcity']}</td>
                    <td>{$row['darea']}</td>
                  </tr>";
        }

        echo "</table>";
    } 
    else 
    {
        echo "An error occurred while executing the query.";
    }
    pg_free_result($result);
}

pg_close($conn);
?>
