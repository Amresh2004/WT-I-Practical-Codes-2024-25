<!DOCTYPE html>
<html>
    <body>
        <form method="post">
            <label>Choose an operation:</label><br><br>
            <select name="operation">
                <option value="insertQueue">Insert an element in queue</option>
                <option value="deleteQueue">Delete an element from queue</option>
                <option value="displayQueue">Display the contents of queue</option>
                /select><br><br>
                <label>Enter an element (if applicable):</label>
                <input type="text" name="element"><br><br>
                <input type="submit" name="submit" value="Perform Operation">
        </form>
            
            <?php
            session_start();
            if (!isset($_SESSION['queue'])) 
            {
                $_SESSION['queue'] = array();
            }
            if ($_SERVER["REQUEST_METHOD"] == "POST") 
            {
                $operation = $_POST['operation'];
                $element = $_POST['element'];
                switch ($operation) 
                {
                    case "insertQueue":
                        if (!empty($element)) 
                        {
                            array_push($_SESSION['queue'], $element);
                            echo "<p>Element '$element' inserted into the queue.</p>";
                        }
                        else 
                        {
                            echo "<p>Please enter an element to insert into the queue.</p>";
                        }
                        break;
                        
                        case "deleteQueue":
                            if (!empty($_SESSION['queue'])) 
                            {
                                $shiftedElement = array_shift($_SESSION['queue']);
                                echo "<p>Element '$shiftedElement' deleted from the queue.</p>";
                            } 
                            else 
                            {
                                echo "<p>The queue is empty. Nothing to delete.</p>";
                            }
                            break;
                            
                            case "displayQueue":
                                if (!empty($_SESSION['queue'])) 
                                {
                                    echo "<p>Queue contents: " . implode(", ", $_SESSION['queue']) . "</p>";
                                } 
                                else 
                                {
                                    echo "<p>The queue is empty.</p>";
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