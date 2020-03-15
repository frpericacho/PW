<html>
<title> Ejercicio 5 </title>
    <body>
        <table border="1px" cellpadding="4" cellspacing="20">
        <?php
        $cont = 0;
        for ($i = 0; $i < 10; ++$i) {
            if (0 == $i % 2) {
                echo '<tr bgcolor ="grey">';
            } else {
                echo '<tr bgcolor ="red">';
            }
            for ($j = 0; $j < 10; ++$j) {
                echo '<td>';
                echo $cont;
                ++$cont;
                echo '</td>';
            }
            echo '</tr>';
        }
        ?>
    </body>
</html>