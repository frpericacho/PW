<html>
<title> Ejercicio 6 </title>
    <body>
        <table border="1px" cellpadding="4" cellspacing="20">
        <?php
        $cont = 1;
        for ($i = 0; $i < 4; ++$i) {
            if (0 == $i % 2) {
                echo '<tr bgcolor ="grey">';
            } else {
                echo '<tr bgcolor ="red">';
            }
            for ($j = 1; $j <= 4; ++$j) {
                echo '<td>';
                echo pow($cont, $j);
                echo '</td>';
            }
            ++$cont;
            echo '</tr>';
        }
        ?>
    </body>
</html>