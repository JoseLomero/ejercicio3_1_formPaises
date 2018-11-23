<!DOCTYPE html>
<html>
    <head>
        <title>Base de datos</title>
        <meta charset="utf-8" />
    </head>
    <body>
    <?php
        # Conexión a la bdd
        $conn = mysqli_connect('localhost','jose','jose123');
        mysqli_select_db($conn, 'world');
        $consulta = "SELECT Name, Code FROM country;";
        $resultat = mysqli_query($conn, $consulta);
        if (!$resultat) {
            $message  = 'Consulta invàlida: ' . mysqli_error() . "\n";
            $message .= 'Consulta realitzada: ' . $consulta;
            die($message);
        }

        echo "<h3>BdD WORLD</h3>";
        echo "<form action='ciudades.php' method='post'>";
            echo "<select name='Continents' value='codigo'>";
                while( $registre = mysqli_fetch_assoc($resultat)) {
                    echo "<option value=".$registre['Code'].">".$registre['Name']."</option>";
                }
            echo "</select><br>";
            echo "<input type='submit' name='submit' placeholder='Submit'>";
        echo "</form>";
    ?>
    </body>
</html>