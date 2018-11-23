<html>
    <head>
        <title>Ciudades MySQL</title>
        <meta charset="utf-8" />
        <style>
            body{
            }
            table,td {
                border: 1px solid black;
                border-spacing: 0px;
            }
        </style>
    </head>
 
    <body>
        <h1>Taula de Ciutats</h1>
    
        <?php
                var_dump($_POST);
            $codigo = $_POST['codigo'];
            $conn = mysqli_connect('localhost','jose','jose123');
            mysqli_select_db($conn, 'world');
            $consulta = "SELECT city.Name ciudad, country.Name pais FROM country, city WHERE city.CountryCode = country.Code AND country.Code = '$codigo'";
            $resultat = mysqli_query($conn, $consulta);    
            if (!$resultat) {
                    $message  = 'Consulta invàlida: ' . mysqli_error() . "\n";
                    $message .= 'Consulta realitzada: ' . $consulta;
                    die($message);
            }
        ?>
    
        <table>
        <thead><td colspan="4" align="center" bgcolor="cyan">Llistat de ciutats</td></thead>
        <?php
            while( $registre = mysqli_fetch_assoc($resultat) )
            {
                echo "\t<tr>\n";
                echo "\t\t<td>".$registre['ciudad']."</td>\n";
                echo "\t\t<td>".$registre['pais']."</td>\n";
                echo "\t</tr>\n";
            }
        ?>
        </table>	
    </body>
</html>