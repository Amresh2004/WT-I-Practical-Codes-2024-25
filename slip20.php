<!DOCTYPE html>
<html>
<form method="post">
    <label>Choose an operation:</label><br><br>
    <select name="operation">
        <option value="chunk">Split an array into chunks</option>
        <option value="sortValues">Sort the array by values without changing keys</option>
        <option value="filtereven">Filter the Even elements from an array</option>
    </select><br><br>

    <label>Enter number of elements per chunk (only for chunk operation):</label><br>
    <input type="number" name="chunkSize"><br><br>

    <input type="submit" name="submit" value="Perform Operation">
</form>

<?php
// Example associative arrays
$array1 = array("a" => 1, "b" => 2, "c" => 3, "d" => 4, "e" => 5);
$array2 = array("c" => 3, "d" => 4, "e" => 5, "f" => 6, "g" => 7);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $operation = $_POST['operation'];

    switch ($operation) {
        case "chunk":
            $chunkSize = $_POST['chunkSize'] ?? 2; 
            $chunks = array_chunk($array1, $chunkSize, true);
            echo "<h3>Array split into chunks:</h3>";
            echo "<pre>";
            print_r($chunks);
            echo "</pre>";
            break;

        case "sortValues":
            asort($array1);
            echo "<h3>Array sorted by values (keys unchanged):</h3>";
            echo "<pre>";
            print_r($array1);
            echo "</pre>";
            break;

        case "filtereven":
            $filteredArray = array_filter($array1, function($value) {
                return $value % 2 !== 1;
            });
            echo "<h3>Filtered array with odd elements:</h3>";
            echo "<pre>";
            print_r($filteredArray);
            echo "</pre>";
            break;

        default:
            echo "<p>Invalid operation selected.</p>";
            break;
    }
}
?>

</body>
</html>