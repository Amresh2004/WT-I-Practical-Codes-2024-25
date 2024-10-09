<?php
    if (isset($_POST['submit'])) {
        $inputString = $_POST['inputString'];
        $operation = $_POST['operation'];

        function selectFirstFiveWords($str) 
        {
            $words = explode(' ', $str);
            $firstFiveWords = array_slice($words, 0, 5);  // Select first 5 words
            return implode(' ', $firstFiveWords);  // Join them back into a string
        }

        function convertToTitleCase($str) 
        {
            $str = strtolower($str);
            $words = explode(' ', $str);
            foreach ($words as &$word) 
            {
                $word = ucfirst($word);
            }
            return implode(' ', $words);
        }

        function padString($str) 
        {
            return "*" . $str . "*";
        }

        function trimString($str) 
        {
            $i = 0;
            while (isset($str[$i]) && $str[$i] == ' ') 
            {
                $i++;
            }
            return substr($str, $i);
        }

        switch ($operation) 
            {
            case 'length':
                echo "5 words of the string: " . selectFirstFiveWords($inputString);
                break;
            case 'titlecase':
                echo "String in Title Case: " . convertToTitleCase($inputString);
                break;
            case 'pad':
                echo "Padded String: " . padString($inputString);
                break;
            case 'trim':
                echo "String after trimming leading whitespaces: " . trimString($inputString);
                break;
            case 'reverse':
                echo "Reversed String: " . strrev($inputString);
                break;
            default:
                echo "Please select a valid operation.";
        }
    }
    ?>