<!DOCTYPE html>
<html>
    <form method="post">
    <label>Choose an operation:</label><br><br>
    <select name="operation">
        <option value="insertStack">Insert an element in stack</option>
        <option value="deleteStack">Delete an element from stack</option>
        <option value="displayStack">Display the contents of stack</option>
    </select><br><br>
    <label>Enter an element (if applicable):</label>
    <input type="text" name="element"><br><br>
    <input type="submit" name="submit" value="Perform Operation">
</form>

<?php
session_start();
if (!isset($_SESSION['stack'])) {
    $_SESSION['stack'] = array();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $operation = $_POST['operation'];
    $element = $_POST['element'];

    switch ($operation) {
        case "insertStack":
            if (!empty($element)) {
                array_push($_SESSION['stack'], $element);
                echo "<p>Element '$element' inserted into the stack.</p>";
            } else {
                echo "<p>Please enter an element to insert into the stack.</p>";
            }
            break;

        case "deleteStack":
            if (!empty($_SESSION['stack'])) {
                $poppedElement = array_pop($_SESSION['stack']);
                echo "<p>Element '$poppedElement' deleted from the stack.</p>";
            } else {
                echo "<p>The stack is empty. Nothing to delete.</p>";
            }
            break;

        case "displayStack":
            if (!empty($_SESSION['stack'])) {
                echo "<p>Stack contents: " . implode(", ", $_SESSION['stack']) . "</p>";
            } else {
                echo "<p>The stack is empty.</p>";
            }
            break;

        default:
            echo "<p>Invalid operation selected.</p>";
            break;
    }
}
?>
</body>
</html>