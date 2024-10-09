<html>
    <body>
        <h3>Chess Board using Nested For Loop</h3>
        <table width="270px" cellspacing="0px" cellpadding="0px" border="1px">
            <?php
            for($row=1;$row<=8;$row++)
            {
                echo "<tr>";
                for($col=1;$col<=8;$col++)
                {
                    $total=$row+$col;
                    if($total%2==0)
                    {
                        echo "<td height=30px width=30px bgcolor=white></td>";
                    }
                    else
                    {
                        echo "<td height=30px width=30px bgcolor=black></td>";
                    }
                }
                echo "</tr>";
            }
            ?>
            </table>
        </body>
</html>