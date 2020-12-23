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

 		

        // Traer el ultimo ID_Viaje
        $stmt = $conn->prepare("SELECT max(ID_Viaje) FROM viaje");

        $stmt->execute();

        $row = $stmt->fetch();
        //echo json_encode ($row);

        $ID_Nuevo = $row[0]+1;

      
        
        // Insertar el viaje
        $stmt = $conn->prepare("INSERT INTO viaje (ID_VIAJE, ID_Usuario, ID_ESCALA, NOMBRE)
            VALUES ($ID_Nuevo, :ID_Usuario, :ID_ESCALA, :NOMBRE)");



        $stmt->bindParam(':ID_Usuario', $ID_Usuario);
        $stmt->bindParam(':ID_ESCALA', $ID_ESCALA);
        $stmt->bindParam(':NOMBRE', $NOMBRE);


    	$ID_Usuario = $_SESSION["‘ID_user’"];
        $ID_ESCALA = $_POST['ID_ESCALA'];
    	$NOMBRE = $_POST['NOMBRE'];


        $stmt->execute();

        echo json_encode ("ok");



        // Insertar los puntos


        //$stmt = $conn->prepare("SELECT max(ID_VIAJE) FROM viaje");



    }

catch(PDOException $e)
    {
        echo $e->getMessage();
        echo json_encode ($result);
        

    }
/*

- En VIAJE (Escala, Usuario, ID_Usuario)
- En PUNTO (ID_Viaje, ID_Usuario, EJE_X, EJE_Y, F_I, F_F, Radio)
- En le_interesa (ID_Punto, ID_Viaje, ID_Usuario, ID_Intereses)


*/
$conn = null;
?>


