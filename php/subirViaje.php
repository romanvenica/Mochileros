<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "u173991785_mochi";
header('Content-Type: application/json');
include("../sesion.php");
try
    {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);         
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 		

        
        // Insertar el viaje

        $stmt = $conn->prepare("INSERT INTO viaje (ID_Usuario, ID_ESCALA, NOMBRE)
            VALUES (:ID_Usuario, :ID_ESCALA, :NOMBRE)");


        $stmt->bindParam(':ID_Usuario', $ID_Usuario);
        $stmt->bindParam(':ID_ESCALA', $ID_ESCALA);
        $stmt->bindParam(':NOMBRE', $NOMBRE);

    	$ID_Usuario = $_SESSION["‘ID_user’"];
    	$ID_ESCALA = $_POST['ID_ESCALA'];
    	$NOMBRE = $_POST['NOMBRE'];


        $stmt->execute();


        // Insertar los puntos


        $stmt = $conn->prepare("SELECT max(ID_VIAJE) FROM viaje");

        $result = $stmt->fetch();






        echo json_encode ($result);

    }
catch(PDOException $e)
    {
        echo $e->getMessage();
        echo json_encode ($result);
        

    }
/*Las conexiones PDO se mantienen abiertas durante el ciclo de vida del objeto PDO*/
/*Asi se cierran los PDO

- En VIAJE (Escala, Usuario, ID_Usuario)
- En PUNTO (ID_Viaje, ID_Usuario, EJE_X, EJE_Y, F_I, F_F, Radio)
- En le_interesa (ID_Punto, ID_Viaje, ID_Usuario, ID_Intereses)


*/
$conn = null;
?>


