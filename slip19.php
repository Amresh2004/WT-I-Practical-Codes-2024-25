<!DOCTYPE html>
<html>
<body>
    <h2>String Operations</h2>
    <form method="post" action="">
        <label for="bigString">Enter a sentence (big string):</label><br>
        <input type="text" id="bigString" name="bigString" required><br><br>

        <label for="smallString">Enter a word (small string):</label><br>
        <input type="text" id="smallString" name="smallString" required><br><br>

        <h3>Delete a part from the sentence</h3>
        <label for="deletePosition">Position to start deletion:</label><br>
        <input type="number" id="deletePosition" name="deletePosition" required><br><br>

        <label for="numChars">Number of characters to delete:</label><br>
        <input type="number" id="numChars" name="numChars" required><br><br>

        <h3>Insert a word into the sentence</h3>
        <label for="insertPosition">Position to insert the small string:</label><br>
        <input type="number" id="insertPosition" name="insertPosition" required><br><br>

        <h3>Replace part of the sentence with the word</h3>
        <label for="replacePosition">Position to start replacement:</label><br>
        <input type="number" id="replacePosition" name="replacePosition" required><br><br>

        <input type="submit" name="submit" value="Perform Operations">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $bigString = $_POST['bigString'];
        $smallString = $_POST['smallString'];
        $deletePosition = $_POST['deletePosition'];
        $numChars = $_POST['numChars'];
        $insertPosition = $_POST['insertPosition'];
        $replacePosition = $_POST['replacePosition'];

        $deletedString = substr_replace($bigString, '', $deletePosition, $numChars);
        $insertedString = substr_replace($bigString, $smallString, $insertPosition, 0);
        $replacedString = substr_replace($bigString, $smallString, $replacePosition, strlen($smallString));

        echo "<h3>Results:</h3>";
        echo "<b>Original String:</b> $bigString<br><br>";
        echo "<b>After Deletion:</b> $deletedString<br><br>";
        echo "<b>After Insertion:</b> $insertedString<br><br>";
        echo "<b>After Replacement:</b> $replacedString<br><br>";
    }
    ?>
</body>
</html>
