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

 		

        ///////// Traer el ultimo ID_Viaje ////////
        $stmt = $conn->prepare("SELECT max(ID_Viaje) FROM viaje");

        $stmt->execute();

        $row = $stmt->fetch();
        //echo json_encode ($row);

        $ID_Nuevo = $row[0]+1;

      
        
        //////// Insertar el viaje /////////
        $stmt = $conn->prepare("INSERT INTO viaje (ID_VIAJE, ID_Usuario, ID_ESCALA, NOMBRE)
            VALUES ($ID_Nuevo, :ID_Usuario, :ID_ESCALA, :NOMBRE)");



        $stmt->bindParam(':ID_Usuario', $ID_Usuario);
        $stmt->bindParam(':ID_ESCALA', $ID_ESCALA);
        $stmt->bindParam(':NOMBRE', $NOMBRE);


        $PUNTOS = $_POST['PUNTOS'];
    	
        $ID_Usuario = $_SESSION["‘ID_user’"];
        $ID_ESCALA = $_POST['ID_ESCALA'];
    	$NOMBRE = $_POST['NOMBRE'];


        $stmt->execute();


        //////// Insertar los puntos /////////
        foreach ($PUNTOS as $PUNTO) {

            $fecha1 = date('Y-m-d', strtotime($PUNTO[2]));
            $fecha2 = date('Y-m-d', strtotime($PUNTO[3]));

                
            $stmt = $conn->prepare("INSERT INTO punto (ID_VIAJE, ID_Usuario, EJE_X, EJE_Y, FECHA_INICIO, FECHA_FIN, RADIO_EXTRA)
                VALUES ($ID_Nuevo, $ID_Usuario, $PUNTO[0], $PUNTO[1], '$fecha1', '$fecha2', $PUNTO[4])");

            $stmt->execute();



            //Necesito el numero del punto
            $stmt = $conn->prepare("SELECT max(ID_Punto) FROM punto");

            $stmt->execute();

            $row = $stmt->fetch();

            $ID_Punto_Nuevo = $row[0];




            // Guardo los intereses


            for ($i=0; $i < count($PUNTO[5]) ; $i++) { 
                if ($PUNTO[5][$i] == "true") {
                    $iTemp = $i+1;
                    $stmt = $conn->prepare("INSERT INTO le_interesa (ID_PUNTO, ID_VIAJE, ID_Usuario, ID_Interes)
                    VALUES ($ID_Punto_Nuevo, $ID_Nuevo, $ID_Usuario, $iTemp)");
                    
                    $stmt->execute();
                }

            }

        }




        echo json_encode ($PUNTO[5]);

        /*
        echo json_encode ($fecha2);
        echo json_encode ($date1);
        echo json_encode ($date2);
        echo json_encode ($PUNTO[2]);
        echo json_encode ($PUNTO[3]);
        */



    }

catch(PDOException $e)
    {
        echo $e->getMessage();
        echo json_encode ($iTemp);
    }
/*

- En VIAJE (Escala, Usuario, ID_Usuario)
- En PUNTO (ID_Viaje, ID_Usuario, EJE_X, EJE_Y, F_I, F_F, Radio)
- En le_interesa (ID_Punto, ID_Viaje, ID_Usuario, ID_Intereses)


*/
$conn = null;
?>


