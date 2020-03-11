<html>
    <title> Relacion Problemas </title>
    <body>
        <?php
            function potencia($base, $exp)
            {
                echo pow($base, $exp);
            }

            define('tam', 4);
            $res = 1;
            echo '<table border>';
                for ($i = 1; $i <= tam; ++$i) {
                    if (0 == $i % 2) {
                        echo '<tr BGCOLOR="green">';
                    }

                    for ($j = 1; $j <= tam; ++$j) {
                        echo '<td>';
                        if (0 == $j % 2) {
                            echo '<td>';
                        }
                        potencia($res, $j);
                        echo '</td>';
                    }
                    ++$res;
                    echo '</tr>';
                }
            echo '</table>';
        ?>
    </body>
</html>