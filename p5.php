<?php
  session_start();
  include("sesion.php");
  $use = $_SESSION["‘ID_user’"];
  $nom = $_SESSION["‘Nombre’"];
  $ape = $_SESSION["‘Apellido’"];
?>

<?php
if(!isset($_SESSION["‘ID_user’"])) {
 header("location: index.html");
} else {
?>

<?php 
$query_cli = mysqli_query($mysqli, "SELECT * FROM usuario WHERE ID_Usuario = $use");
while ($data_cli=mysqli_fetch_assoc($query_cli)) { 
    $nom = $data_cli['Nombre'];
    $ape = $data_cli['Apellido'];
    $eda = $data_cli['Edad'];
    $pai = $data_cli['Pais'];
    $con = $data_cli['Contacto'];
    $des = $data_cli['Descripcion_U'];
    }
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mochileros</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilos-login.css">
    <link rel="icon" type="image/png" href="img/logomini.png" />
  
    <meta name="google-signin-client_id" content="1081528677434-oc751ppavto9boc1ap67sae8tbheo2r2.apps.googleusercontent.com">

</head>
<body class="f_PC">
    <header>
        <div class="container" id="cabezalMenu">
<div class="row menuArriba">
  <div class="col-sm-12">
  <ul class="nav nav-tabs">
    <div class="row">
      <div class="col-xs-2">
        <li role="presentation"><a href="p1.php"> <span><img class="ovalo" src="img/logomini.png" alt="" /></span></a></li>
      </div>
      <div class="col-xs-8">
        
      </div>
      <div class="col-xs-2">
        <ul class="nav navbar-right">
              <li class="dropdown right">
                  <a href="#" class="dropdown-toggle btn btn-link" data-toggle="dropdown" id="botoncitoMenu">
                      <span class="glyphicon glyphicon-th-list glylg"></span> 
                  </a>
                  <ul class="dropdown-menu dropdown-menu-right menucito">

                      <li>
                          <div class="navbar-login">
                              <div class="row">
                                  <div>
                                      <p class="text-center">
                                      <?php 
                                        echo '<span><img class="cardo" alt="chau" src="img/foto/'.$use.'.jpg"/></span>'; 
                                      ?>
                                      </p>
                                  </div>
                                <div>
                                    <p id="user" class="text-center"><strong><?php echo $nom;?> <?php echo $ape;?></strong></p>
                                </div>
                              </div>
                            <?php if ($use == 1) {?>
                              <div class="g-signin2 botonLoginInvitado" data-onsuccess="onSignIn"></div>
                           <?php  }; ?> 
                           <?php if ($use != 1) {?>
                              <div class="row">
                                  <div class="col-sm-12">
                                      <p>
                                          <a href="p2.php" class="btn btn-info btn-block botoncitoBorrable">Mi Perfil</a>
                                      </p>
                                  </div>
                              </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <p>
                                        <a href="p4.php" class="btn btn-primary btn-block botoncitoBorrable">Mis Viajes</a>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <p>
                                        <a href="p7.php" class="btn btn-success btn-block botoncitoBorrable">Contactos</a>
                                    </p>
                                </div>
                            </div>
                              <?php   } ?> 
                          </div>
                      </li>
                      <li class="divider"></li>
                      <li>
                          <div class="navbar-login navbar-login-session">
                              <div class="row">
                                  <div class="col-lg-12">
                                      <p>
                                        <a href="#" onclick="signOut();" class="btn btn-danger btn-block botoncitoBorrable">Cerrar Sesion</a>
                                      </p>
                                  </div>
                              </div>
                          </div>
                      </li>
                  </ul>
              </li>
          </ul>
      </div>
    </div>
    </ul>
  </div>
</div>
<br>



        <div class="contenedorMapa">
          <div id="mapaGoogle" width="100%">           
          </div>           
        </div>

<div class="cajitaDeLosBotones">

<button id="botonTest" onclick="botonazo()">botonazo</button>

<input id="agregarPuntito" type="button" class="btn btn-primary oculto" value="Agregar puntito" onclick="agregarPuntito()"> 

<input id="confirmarPuntito" type="button" class="btn btn-success oculto" value="Confirmar puntito" onclick="confirmarPuntito()"> 

<input id="editarPuntito" type="button" class="btn btn-warning oculto" value="Confirmar edición" onclick="editarPuntito()"> 

</div>

<br>

<div class="marco_escala">
          <div class="row contenedorEscala">
            <div class="col-xs-12 center">
              <!-- <span class="mensajeErrorCoincidencias">Sin coincidencias!</span> -->
              <span class="negrita">
                Nombre: 
              </span>
            </div>

            <div class="col-xs-12 center divDeEscalaInput">
              <input class="form-control center" placeholder="Ponele un nombre" id="nombreViaje" maxlength="32">


            </div> 



            <div class="col-xs-12 center">
              <br>

              <!-- <span class="mensajeErrorCoincidencias">Sin coincidencias!</span> -->
              <span class="negrita">
                Escala: 
              </span>
            </div>  


            <div class="col-xs-12 center divDeEscalaInput">
              <input class="form-control center" list="escala" placeholder="Seleccione Pais" id="escalaInput">

                <!--################## ESCALA ###############-->
                <datalist id="escala">
                  <!-- <option data-value="0" value="Global">
                  <option data-value="1" value="America">
                  <option data-value="2" value="Europa">
                  <option data-value="3" value="Africa">
                  <option data-value="4" value="Asia">
                  <option data-value="5" value="Oceania"> -->
                  <option data-value="6" value="Afganistan">
                  <option data-value="7" value="Albania">
                  <option data-value="8" value="Alemania">
                  <option data-value="9" value="Andorra">
                  <option data-value="10" value="Angola">
                  <option data-value="11" value="Anguilla">
                  <option data-value="12" value="Antartida">
                  <option data-value="13" value="Antigua y Barbuda">
                  <option data-value="14" value="Antillas Holandesas">
                  <option data-value="15" value="Arabia Saudi">
                  <option data-value="16" value="Argelia">
                  <option data-value="17" value="Argentina">
                  <option data-value="18" value="Armenia">
                  <option data-value="19" value="Aruba">
                  <option data-value="20" value="Australia">
                  <option data-value="21" value="Austria">
                  <option data-value="22" value="Azerbaiyan">
                  <option data-value="23" value="Bahamas">
                  <option data-value="24" value="Bahrein">
                  <option data-value="25" value="Bangladesh">
                  <option data-value="26" value="Barbados">
                  <option data-value="27" value="Belgica">
                  <option data-value="28" value="Belice">
                  <option data-value="29" value="Benin">
                  <option data-value="30" value="Bermudas">
                  <option data-value="31" value="Bielorrusia">
                  <option data-value="32" value="Birmania">
                  <option data-value="33" value="Bolivia">
                  <option data-value="34" value="Bosnia y Herzegovina">
                  <option data-value="35" value="Botswana">
                  <option data-value="36" value="Brasil">
                  <option data-value="37" value="Brunei">
                  <option data-value="38" value="Bulgaria">
                  <option data-value="39" value="Burkina Faso">
                  <option data-value="40" value="Burundi">
                  <option data-value="41" value="Butan">
                  <option data-value="42" value="Cabo Verde">
                  <option data-value="43" value="Camboya">
                  <option data-value="44" value="Camerun">
                  <option data-value="45" value="Canada">
                  <option data-value="46" value="Chad">
                  <option data-value="47" value="Chile">
                  <option data-value="48" value="China">
                  <option data-value="49" value="Chipre">
                  <option data-value="50" value="Ciudad del Vaticano (Santa Sede)">
                  <option data-value="51" value="Colombia">
                  <option data-value="52" value="Comores">
                  <option data-value="53" value="Congo">
                  <option data-value="54" value="Congo, Republica Democratica del">
                  <option data-value="55" value="Corea">
                  <option data-value="56" value="Corea del Norte">
                  <option data-value="57" value="Costa de Marfil">
                  <option data-value="58" value="Costa Rica">
                  <option data-value="59" value="Croacia (Hrvatska)">
                  <option data-value="60" value="Cuba">
                  <option data-value="61" value="Dinamarca">
                  <option data-value="62" value="Djibouti">
                  <option data-value="63" value="Dominica">
                  <option data-value="64" value="Ecuador">
                  <option data-value="65" value="Egipto">
                  <option data-value="66" value="El Salvador">
                  <option data-value="67" value="Emiratos arabes Unidos">
                  <option data-value="68" value="Eritrea">
                  <option data-value="69" value="Eslovenia">
                  <option data-value="70" value="Espana">
                  <option data-value="71" value="Estados Unidos">
                  <option data-value="72" value="Estonia">
                  <option data-value="73" value="Etiopia">
                  <option data-value="74" value="Fiji">
                  <option data-value="75" value="Filipinas">
                  <option data-value="76" value="Finlandia">
                  <option data-value="77" value="Francia">
                  <option data-value="78" value="Gabon">
                  <option data-value="79" value="Gambia">
                  <option data-value="80" value="Georgia">
                  <option data-value="81" value="Ghana">
                  <option data-value="82" value="Gibraltar">
                  <option data-value="83" value="Granada">
                  <option data-value="84" value="Grecia">
                  <option data-value="85" value="Groenlandia">
                  <option data-value="86" value="Guadalupe">
                  <option data-value="87" value="Guam">
                  <option data-value="88" value="Guatemala">
                  <option data-value="89" value="Guayana">
                  <option data-value="90" value="Guayana Francesa">
                  <option data-value="91" value="Guinea">
                  <option data-value="92" value="Guinea Ecuatorial">
                  <option data-value="93" value="Guinea-Bissau">
                  <option data-value="94" value="Haiti">
                  <option data-value="95" value="Honduras">
                  <option data-value="96" value="Hungria">
                  <option data-value="97" value="India">
                  <option data-value="98" value="Indonesia">
                  <option data-value="99" value="Irak">
                  <option data-value="100" value="Iran">
                  <option data-value="101" value="Irlanda">
                  <option data-value="102" value="Isla Bouvet">
                  <option data-value="103" value="Isla de Christmas">
                  <option data-value="104" value="Islandia">
                  <option data-value="105" value="Islas Caiman">
                  <option data-value="106" value="Islas Cook">
                  <option data-value="107" value="Islas de Cocos o Keeling">
                  <option data-value="108" value="Islas Faroe">
                  <option data-value="109" value="Islas Heard y McDonald">
                  <option data-value="110" value="Islas Malvinas">
                  <option data-value="111" value="Islas Marianas del Norte">
                  <option data-value="112" value="Islas Marshall">
                  <option data-value="113" value="Islas menores de Estados Unidos">
                  <option data-value="114" value="Islas Palau">
                  <option data-value="115" value="Islas Salomon">
                  <option data-value="116" value="Islas Svalbard y Jan Mayen">
                  <option data-value="117" value="Islas Tokelau">
                  <option data-value="118" value="Islas Turks y Caicos">
                  <option data-value="119" value="Islas Virgenes (EEUU)">
                  <option data-value="120" value="Islas Virgenes (Reino Unido)">
                  <option data-value="121" value="Islas Wallis y Futuna">
                  <option data-value="122" value="Israel">
                  <option data-value="123" value="Italia">
                  <option data-value="124" value="Jamaica">
                  <option data-value="125" value="Japon"> 
                  <option data-value="126" value="Jordania">
                  <option data-value="127" value="Kazajistan">
                  <option data-value="128" value="Kenia">
                  <option data-value="129" value="Kirguizistan">
                  <option data-value="130" value="Kiribati">
                  <option data-value="131" value="Kuwait">
                  <option data-value="132" value="Laos">
                  <option data-value="133" value="Lesotho">
                  <option data-value="134" value="Letonia">
                  <option data-value="135" value="Libano">
                  <option data-value="136" value="Liberia">
                  <option data-value="137" value="Libia">
                  <option data-value="138" value="Liechtenstein">
                  <option data-value="139" value="Lituania">
                  <option data-value="140" value="Luxemburgo">
                  <option data-value="141" value="Macedonia, Ex-Republica Yugoslava de">
                  <option data-value="142" value="Madagascar">
                  <option data-value="143" value="Malasia">
                  <option data-value="144" value="Malawi">
                  <option data-value="145" value="Maldivas">
                  <option data-value="146" value="Mali">
                  <option data-value="147" value="Malta">
                  <option data-value="148" value="Marruecos">
                  <option data-value="149" value="Martinica">
                  <option data-value="150" value="Mauricio">
                  <option data-value="151" value="Mauritania">
                  <option data-value="152" value="Mayotte">
                  <option data-value="153" value="Mexico">
                  <option data-value="154" value="Micronesia">
                  <option data-value="155" value="Moldavia">
                  <option data-value="156" value="Monaco">
                  <option data-value="157" value="Mongolia">
                  <option data-value="158" value="Montserrat">
                  <option data-value="159" value="Mozambique">
                  <option data-value="160" value="Namibia">
                  <option data-value="161" value="Nauru">
                  <option data-value="162" value="Nepal">
                  <option data-value="163" value="Nicaragua">
                  <option data-value="164" value="Niger">
                  <option data-value="165" value="Nigeria">
                  <option data-value="166" value="Niue">
                  <option data-value="167" value="Norfolk">
                  <option data-value="168" value="Noruega">
                  <option data-value="169" value="Nueva Caledonia">
                  <option data-value="170" value="Nueva Zelanda">
                  <option data-value="171" value="Oman">
                  <option data-value="172" value="Paises Bajos">
                  <option data-value="173" value="Panama">
                  <option data-value="174" value="Papua Nueva Guinea">
                  <option data-value="175" value="Paquistan">
                  <option data-value="176" value="Paraguay">
                  <option data-value="177" value="Peru">
                  <option data-value="178" value="Pitcairn">
                  <option data-value="179" value="Polinesia Francesa">
                  <option data-value="180" value="Polonia">
                  <option data-value="181" value="Portugal">
                  <option data-value="182" value="Puerto Rico">
                  <option data-value="183" value="Qatar">
                  <option data-value="184" value="Reino Unido">
                  <option data-value="185" value="Republica Centroafricana">
                  <option data-value="186" value="Republica Checa">
                  <option data-value="187" value="Republica de Sudafrica">
                  <option data-value="188" value="Republica Dominicana">
                  <option data-value="189" value="Republica Eslovaca">
                  <option data-value="190" value="Reunion">
                  <option data-value="191" value="Ruanda">
                  <option data-value="192" value="Rumania">
                  <option data-value="193" value="Rusia">
                  <option data-value="194" value="Sahara Occidental">
                  <option data-value="195" value="Saint Kitts y Nevis">
                  <option data-value="196" value="Samoa">
                  <option data-value="197" value="Samoa Americana">
                  <option data-value="198" value="San Marino">
                  <option data-value="199" value="San Vicente y Granadinas">
                  <option data-value="200" value="Santa Helena">
                  <option data-value="201" value="Santa Lucia">
                  <option data-value="202" value="Santo Tome y Principe">
                  <option data-value="203" value="Senegal">
                  <option data-value="204" value="Seychelles">
                  <option data-value="205" value="Sierra Leona">
                  <option data-value="206" value="Singapur">
                  <option data-value="207" value="Siria">
                  <option data-value="208" value="Somalia">
                  <option data-value="209" value="Sri Lanka">
                  <option data-value="210" value="St Pierre y Miquelon">
                  <option data-value="211" value="Suazilandia">
                  <option data-value="212" value="Sudan">
                  <option data-value="213" value="Suecia">
                  <option data-value="214" value="Suiza">
                  <option data-value="215" value="Surinam">
                  <option data-value="216" value="Tailandia">
                  <option data-value="217" value="Taiwan">
                  <option data-value="218" value="Tanzania">
                  <option data-value="219" value="Tayikistan">
                  <option data-value="220" value="Territorios franceses del Sur">
                  <option data-value="221" value="Timor Oriental">
                  <option data-value="222" value="Togo">
                  <option data-value="223" value="Tonga">
                  <option data-value="224" value="Trinidad y Tobago">
                  <option data-value="225" value="Tunez">
                  <option data-value="226" value="Turkmenistan">
                  <option data-value="227" value="Turquia">
                  <option data-value="228" value="Tuvalu">
                  <option data-value="229" value="Ucrania">
                  <option data-value="230" value="Uganda">
                  <option data-value="231" value="Uruguay">
                  <option data-value="232" value="Uzbekistan">
                  <option data-value="233" value="Vanuatu">
                  <option data-value="234" value="Venezuela">
                  <option data-value="235" value="Vietnam">
                  <option data-value="236" value="Yemen">
                  <option data-value="237" value="Yugoslavia">
                  <option data-value="238" value="Zambia">
                  <option data-value="239" value="Zimbabue">
                </datalist> 
              <!-- <input type="text" class="form-control input-sm inputEscala"> -->
            </div> 

          </div>
          <br>
</div>

<div class="row">
            <div class="col-xs-6">
                <strong>Desde:</strong>
                <input class="form-control " required="required" type="date" id="fechaDesde" disabled>
            </div>
            <div class="col-xs-6">
                <strong>Hasta:</strong>
                <input class="form-control " required="required" type="date" id="fechaHasta" disabled>
            </div>
</div>


<br>

<section class="" >
          <div class="row">
            <div class="col-xs-6">
              <input type="checkbox" class="checkInteres" name="citas" id="citas" value="1" disabled> 
                <label for="citas">
                  Citas
                </label>
            </div>
            <div class="col-xs-6">
              <input type="checkbox" class="checkInteres" name="fotos" id="fotos" value="2" disabled> 
                <label for="fotos">
                  Fotos
                </label>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-6">
              <input type="checkbox" class="checkInteres" name="comer" id="comer" value="3" disabled> 
                <label for="comer">
                  Comer
                </label>
            </div>
            <div class="col-xs-6">
              <input type="checkbox" class="checkInteres" name="bailar" id="bailar" value="4" disabled> 
                <label for="bailar">
                  Bailar
                </label>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-6">
              <input type="checkbox" class="checkInteres" name="deportes" id="deportes" value="5" disabled>
                <label for="deportes">
                  Deportes
                </label>
            </div>
            <div class="col-xs-6">
              <input type="checkbox" class="checkInteres" name="musica" id="musica" value="6" disabled>
                <label for="musica">
                  Musica
                </label> 
            </div>
          </div>
          <div class="row">
            <div class="col-xs-6">
              <input type="checkbox" class="checkInteres" name="cultura" id="cultura" value="7" disabled>
                <label for="cultura">
                  Cultura
                </label> 
            </div>
            <div class="col-xs-6">
              <input type="checkbox" class="checkInteres" name="amigos" id="amigos" value="8" disabled>
                <label for="amigos">
                  Amigos
                </label> 
            </div>
          </div>
</section>
<br>
  Puedo alejarme: <input id="puedoAlejarme" type="number" name="" placeholder="" class="form-control " onkeyup="maximoTres()" disabled> cuadras.
<br>

<br>

          <div class="row ">
            <div class="col-xs-8 col-xs-offset-2">
              <a href="#"><button id="empezarViajeBoton" onclick="empezarViaje()" type="button" class="botonBuscarFondoPantalla btn btn-lg  btn-block btn-warning">Empezar viaje</button></a>
            </div>
          </div>

          <div class="row oculto" id="cajaDeConfirmarViajeBoton">
            <div class="col-xs-8 col-xs-offset-2">
              <a href="#"><button id="confirmarViajeBoton" onclick="confirmarViaje()" type="button" class="botonBuscarFondoPantalla btn btn-lg  btn-block btn-success">Confirmar viaje!</button></a>
            </div>
          </div>



      </div>
    </header>
    <script
    src="https://code.jquery.com/jquery-3.2.1.min.js"
    integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
    crossorigin="anonymous"></script>

    <script src="js/bootstrap.min.js"></script>
    <script src="js/funciones.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC0oZCB95kI3LlHGjXLxhoPYjNvmFYtY1g&callback=initMap"
          async defer></script>

    <script src="https://apis.google.com/js/platform.js?onload=onLoad" async defer></script>

    
    <script src="js/scrips.js"></script>
    <script src="js/buscarViaje.js"></script>
    <script src="js/fancywebsocket.js"></script>
    <script src="js/viajes.js"></script>
</body>
</html>

<?php } ?>