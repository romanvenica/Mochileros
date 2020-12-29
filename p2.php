<?php
  session_start();
  include("sesion.php");
  $use = $_SESSION["‘ID_user’"];
  $nom = $_SESSION["‘Nombre’"];
  $ape = $_SESSION["‘Apellido’"];
?>



<?php if ($use == 1) {
  header("location: p1.php");
} ?>

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

 <?php
if(!isset($_SESSION["‘ID_user’"])) {
 header("location: index.html");
}
?>
<script type="text/javascript">
    var myvar='<?php echo $use;?>';
</script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" charset=UTF-8"> 
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

        <div class="card">
                <canvas class="header-bg" width="250" height="70" id="header-blur"></canvas>
                <div class="avatar">
                    <div class="row">
                        <div class="col-xs-5">
<!--                           <form action="editar_foto.php" id="form-foto" enctype="multipart/form-data" method="POST" > -->
  <form id="form_usuario" action="editar_perfil.php" enctype="multipart/form-data" method="POST" accept-charset="utf-8" class="form" role="form">
                             <div class="box12">
                              <?php 
                                echo '<label for="image"><div id="foto_perfil"><img id="foto_user" alt="chau" src="img/foto/'.$use.'.jpg"/></div></label>';
                              ?>
                              <div class="box-content" align="right">
                                <div class="icon">
                                    <label for="image"><span class="glyphicon glyphicon-camera camara-icono"></span></label>
                                    <input name="image" id="image" type="file" class="hidden">
                                  </div>
                              </div>
                            </div>
<!--                             <input name="insert" id="insert" type="submit" value="submit" class="hidden" data-toggle="modal" data-target="#modal_error">
                          </form>   -->
                        </div>
                        
                        <div class="col-xs-7">
                            <input type="text" id="nom-form" disabled="" name="nombre" value="<?php echo $nom;?>" class="form-control nombreUsuario" placeholder="Nombre"  />
                            <p id="p-nom" class="error"></p>
                        
                            <input type="text" id="ape-form" disabled="" name="apellido" value="<?php echo $ape;?>" class="form-control nombreUsuario" placeholder=""  />
                            <p id="p-ap" class="error"></p>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        <div class="row">
            <div class="col-xs-12">
                <label class="licki">Pais</label>
                <select class="form-control" disabled="" id="select_pais" name="pais">
                  <option value="6" data-value="Afganistan">Afganistan</option>
                  <option value="7" data-value="Albania">Albania</option>
                  <option value="8" data-value="Alemania">Alemania</option>
                  <option value="9" data-value="Andorra">Andorra</option>
                  <option value="10" data-value="Angola">Angola</option>
                  <option value="11" data-value="Anguilla">Anguilla</option>
                  <option value="12" data-value="Antartida">Antartida</option>
                  <option value="13" data-value="Antigua y Barbuda">Antigua y Barbuda</option>
                  <option value="14" data-value="Antillas Holandesas">Antillas Holandesas</option>
                  <option value="15" data-value="Arabia Saudi">Arabia Saudi</option>
                  <option value="16" data-value="Argelia">Argelia</option>
                  <option value="17" data-value="Argentina">Argentina</option>
                  <option value="18" data-value="Armenia">Armenia</option>
                  <option value="19" data-value="Aruba">Aruba</option>
                  <option value="20" data-value="Australia">Australia</option>
                  <option value="21" data-value="Austria">Austria</option>
                  <option value="22" data-value="Azerbaiyan">Azerbaiyan</option>
                  <option value="23" data-value="Bahamas">Bahamas</option>
                  <option value="24" data-value="Bahrein">Bahrein</option>
                  <option value="25" data-value="Bangladesh">Bangladesh</option>
                  <option value="26" data-value="Barbados">Barbados</option>
                  <option value="27" data-value="Belgica">Belgica</option>
                  <option value="28" data-value="Belice">Belice</option>
                  <option value="29" data-value="Benin">Benin</option>
                  <option value="30" data-value="Bermudas">Bermudas</option>
                  <option value="31" data-value="Bielorrusia">Bielorrusia</option>
                  <option value="32" data-value="Birmania">Birmania</option>
                  <option value="33" data-value="Bolivia">Bolivia</option>
                  <option value="34" data-value="Bosnia y Herzegovina">Bosnia y Herzegovina</option>
                  <option value="35" data-value="Botswana">Botswana</option>
                  <option value="36" data-value="Brasil">Brasil</option>
                  <option value="37" data-value="Brunei">Brunei</option>
                  <option value="38" data-value="Bulgaria">Bulgaria</option>
                  <option value="39" data-value="Burkina Faso">Burkina Faso</option>
                  <option value="40" data-value="Burundi">Burundi</option>
                  <option value="41" data-value="Butan">Butan</option>
                  <option value="42" data-value="Cabo Verde">Cabo Verde</option>
                  <option value="43" data-value="Camboya">Camboya</option>
                  <option value="44" data-value="Camerun">Camerun</option>
                  <option value="45" data-value="Canada">Canada</option>
                  <option value="46" data-value="Chad">Chad</option>
                  <option value="47" data-value="Chile">Chile</option>
                  <option value="48" data-value="China">China</option>
                  <option value="49" data-value="Chipre">Chipre</option>
                  <option value="50" data-value="Ciudad del Vaticano (Santa Sede)">Ciudad del Vaticano (Santa Sede)</option>
                  <option value="51" data-value="Colombia">Colombia</option>
                  <option value="52" data-value="Comores">Comores</option>
                  <option value="53" data-value="Congo">Congo</option>
                  <option value="54" data-value="Congo, Republica Democratica del">Congo, Republica Democratica del</option>
                  <option value="55" data-value="Corea">Corea</option>
                  <option value="56" data-value="Corea del Norte">Corea del Norte</option>
                  <option value="57" data-value="Costa de Marfil">Costa de Marfil</option>
                  <option value="58" data-value="Costa Rica">Costa Rica</option>
                  <option value="59" data-value="Croacia (Hrvatska)">Croacia (Hrvatska)</option>
                  <option value="60" data-value="Cuba">Cuba</option>
                  <option value="61" data-value="Dinamarca">Dinamarca</option>
                  <option value="62" data-value="Djibouti">Djibouti</option>
                  <option value="63" data-value="Dominica">Dominica</option>
                  <option value="64" data-value="Ecuador">Ecuador</option>
                  <option value="65" data-value="Egipto">Egipto</option>
                  <option value="66" data-value="El Salvador">El Salvador</option>
                  <option value="67" data-value="Emiratos arabes Unidos">Emiratos arabes Unidos</option>
                  <option value="68" data-value="Eritrea">Eritrea</option>
                  <option value="69" data-value="Eslovenia">Eslovenia</option>
                  <option value="70" data-value="Espana">Espana</option>
                  <option value="71" data-value="Estados Unidos">Estados Unidos</option>
                  <option value="72" data-value="Estonia">Estonia</option>
                  <option value="73" data-value="Etiopia">Etiopia</option>
                  <option value="74" data-value="Fiji">Fiji</option>
                  <option value="75" data-value="Filipinas">Filipinas</option>
                  <option value="76" data-value="Finlandia">Finlandia</option>
                  <option value="77" data-value="Francia">Francia</option>
                  <option value="78" data-value="Gabon">Gabon</option>
                  <option value="79" data-value="Gambia">Gambia</option>
                  <option value="80" data-value="Georgia">Georgia</option>
                  <option value="81" data-value="Ghana">Ghana</option>
                  <option value="82" data-value="Gibraltar">Gibraltar</option>
                  <option value="83" data-value="Granada">Granada</option>
                  <option value="84" data-value="Grecia">Grecia</option>
                  <option value="85" data-value="Groenlandia">Groenlandia</option>
                  <option value="86" data-value="Guadalupe">Guadalupe</option>
                  <option value="87" data-value="Guam">Guam</option>
                  <option value="88" data-value="Guatemala">Guatemala</option>
                  <option value="89" data-value="Guayana">Guayana</option>
                  <option value="90" data-value="Guayana Francesa">Guayana Francesa</option>
                  <option value="91" data-value="Guinea">Guinea</option>
                  <option value="92" data-value="Guinea Ecuatorial">Guinea Ecuatorial</option>
                  <option value="93" data-value="Guinea-Bissau">Guinea-Bissau</option>
                  <option value="94" data-value="Haiti">Haiti</option>
                  <option value="95" data-value="Honduras">Honduras</option>
                  <option value="96" data-value="Hungria">Hungria</option>
                  <option value="97" data-value="India">India</option>
                  <option value="98" data-value="Indonesia">Indonesia</option>
                  <option value="99" data-value="Irak">Irak</option>
                  <option value="100" data-value="Iran">Iran</option>
                  <option value="101" data-value="Irlanda">Irlanda</option>
                  <option value="102" data-value="Isla Bouvet">Isla Bouvet</option>
                  <option value="103" data-value="Isla de Christmas">Isla de Christmas</option>
                  <option value="104" data-value="Islandia">Islandia</option>
                  <option value="105" data-value="Islas Caiman">Islas Caiman</option>
                  <option value="106" data-value="Islas Cook">Islas Cook</option>
                  <option value="107" data-value="Islas de Cocos o Keeling">Islas de Cocos o Keeling</option>
                  <option value="108" data-value="Islas Faroe">Islas Faroe</option>
                  <option value="109" data-value="Islas Heard y McDonald">Islas Heard y McDonald</option>
                  <option value="110" data-value="Islas Malvinas">Islas Malvinas</option>
                  <option value="111" data-value="Islas Marianas del Norte">Islas Marianas del Norte</option>
                  <option value="112" data-value="Islas Marshall">Islas Marshall</option>
                  <option value="113" data-value="Islas menores de Estados Unidos">Islas menores de Estados Unidos</option>
                  <option value="114" data-value="Islas Palau">Islas Palau</option>
                  <option value="115" data-value="Islas Salomon">Islas Salomon</option>
                  <option value="116" data-value="Islas Svalbard y Jan Mayen">slas Svalbard y Jan Mayen</option>
                  <option value="117" data-value="Islas Tokelau">Islas Tokelau</option>
                  <option value="118" data-value="Islas Turks y Caicos">Islas Turks y Caicos</option>
                  <option value="119" data-value="Islas Virgenes (EEUU)">Islas Virgenes (EEUU)</option>
                  <option value="120" data-value="Islas Virgenes (Reino Unido)">Islas Virgenes (Reino Unido)</option>
                  <option value="121" data-value="Islas Wallis y Futuna">slas Wallis y Futuna</option>
                  <option value="122" data-value="Israel">Israel</option>
                  <option value="123" data-value="Italia">Italia</option>
                  <option value="124" data-value="Jamaica">Jamaica</option>
                  <option value="125" data-value="Japon">Japon</option>
                  <option value="126" data-value="Jordania">Jordania</option>
                  <option value="127" data-value="Kazajistan">Kazajistan</option>
                  <option value="128" data-value="Kenia">Kenia</option>
                  <option value="129" data-value="Kirguizistan">Kirguizistan</option>
                  <option value="130" data-value="Kiribati">Kiribati</option>
                  <option value="131" data-value="Kuwait">Kuwait</option>
                  <option value="132" data-value="Laos">Laos</option>
                  <option value="133" data-value="Lesotho">Lesotho</option>
                  <option value="134" data-value="Letonia">Letonia</option>
                  <option value="135" data-value="Libano">Libano</option>
                  <option value="136" data-value="Liberia">Liberia</option>
                  <option value="137" data-value="Libia">Libia</option>
                  <option value="138" data-value="Liechtenstein">Liechtenstein</option>
                  <option value="139" data-value="Lituania">Lituania</option>
                  <option value="140" data-value="Luxemburgo">Luxemburgo</option>
                  <option value="141" data-value="Macedonia, Ex-Republica Yugoslava de">Macedonia, Ex-Republica Yugoslava de</option>
                  <option value="142" data-value="Madagascar">Madagascar</option>
                  <option value="143" data-value="Malasia">Malasia</option>
                  <option value="144" data-value="Malawi">Malawi</option>
                  <option value="145" data-value="Maldivas">Maldivas</option>
                  <option value="146" data-value="Mali">Mali</option>
                  <option value="147" data-value="Malta">Malta</option>
                  <option value="148" data-value="Marruecos">Marruecos</option>
                  <option value="149" data-value="Martinica">Martinica</option>
                  <option value="150" data-value="Mauricio">Mauricio</option>
                  <option value="151" data-value="Mauritania">Mauritania</option>
                  <option value="152" data-value="Mayotte">Mayotte</option>
                  <option value="153" data-value="Mexico">Mexico</option>
                  <option value="154" data-value="Micronesia">Micronesia</option>
                  <option value="155" data-value="Moldavia">Moldavia</option>
                  <option value="156" data-value="Monaco">Monaco</option>
                  <option value="157" data-value="Mongolia">Mongolia</option>
                  <option value="158" data-value="Montserrat">Montserrat</option>
                  <option value="159" data-value="Mozambique">Mozambique</option>
                  <option value="160" data-value="Namibia">Namibia</option>
                  <option value="161" data-value="Nauru">Nauru</option>
                  <option value="162" data-value="Nepal">Nepal</option>
                  <option value="163" data-value="Nicaragua">Nicaragua</option>
                  <option value="164" data-value="Niger">Niger</option>
                  <option value="165" data-value="Nigeria">Nigeria</option>
                  <option value="166" data-value="Niue">Niue</option>
                  <option value="167" data-value="Norfolk">Norfolk</option>
                  <option value="168" data-value="Noruega">Noruega</option>
                  <option value="169" data-value="Nueva Caledonia">Nueva Caledonia</option>
                  <option value="170" data-value="Nueva Zelanda">Nueva Zelanda</option>
                  <option value="171" data-value="Oman">Oman</option>
                  <option value="172" data-value="Paises Bajos">Paises Bajos</option>
                  <option value="173" data-value="Panama">Panama</option>
                  <option value="174" data-value="Papua Nueva Guinea">Papua Nueva Guinea</option>
                  <option value="175" data-value="Paquistan">Paquistan</option>
                  <option value="176" data-value="Paraguay">Paraguay</option>
                  <option value="177" data-value="Peru">Peru</option>
                  <option value="178" data-value="Pitcairn">Pitcairn</option>
                  <option value="179" data-value="Polinesia Francesa">Polinesia Francesa</option>
                  <option value="180" data-value="Polonia">Polonia</option>
                  <option value="181" data-value="Portugal">Portugal</option>
                  <option value="182" data-value="Puerto Rico">Puerto Rico</option>
                  <option value="183" data-value="Qatar">Qatar</option>
                  <option value="184" data-value="Reino Unido">Reino Unido</option>
                  <option value="185" data-value="Republica Centroafricana">Republica Centroafricana</option>
                  <option value="186" data-value="Republica Checa">Republica Checa</option>
                  <option value="187" data-value="Republica de Sudafrica">Republica de Sudafrica</option>
                  <option value="188" data-value="Republica Dominicana">Republica Dominicana</option>
                  <option value="189" data-value="Republica Eslovaca">Republica Eslovaca</option>
                  <option value="190" data-value="Reunion">Reunion</option>
                  <option value="191" data-value="Ruanda">Ruanda</option>
                  <option value="192" data-value="Rumania">Rumania</option>
                  <option value="193" data-value="Rusia">Rusia</option>
                  <option value="194" data-value="Sahara Occidental">Sahara Occidental</option>
                  <option value="195" data-value="Saint Kitts y Nevis">Saint Kitts y Nevis</option>
                  <option value="196" data-value="Samoa">Samoa</option>
                  <option value="197" data-value="Samoa Americana">Samoa Americana</option>
                  <option value="198" data-value="San Marino">San Marino</option>
                  <option value="199" data-value="San Vicente y Granadinas">San Vicente y Granadinas</option>
                  <option value="200" data-value="Santa Helena">Santa Helena</option>
                  <option value="201" data-value="Santa Lucia">Santa Lucia</option>
                  <option value="202" data-value="Santo Tome y Principe">Santo Tome y Principe</option>
                  <option value="203" data-value="Senegal">Senegal</option>
                  <option value="204" data-value="Seychelles">Seychelles</option>
                  <option value="205" data-value="Sierra Leona">Sierra Leona</option>
                  <option value="206" data-value="Singapur">Singapur</option>
                  <option value="207" data-value="Siria">Siria</option>
                  <option value="208" data-value="Somalia">Somalia</option>
                  <option value="209" data-value="Sri Lanka">Sri Lanka</option>
                  <option value="210" data-value="St Pierre y Miquelon">St Pierre y Miquelon</option>
                  <option value="211" data-value="Suazilandia">Suazilandia</option>
                  <option value="212" data-value="Sudan">Sudan</option>
                  <option value="213" data-value="Suecia">Suecia</option>
                  <option value="214" data-value="Suiza">Suiza</option>
                  <option value="215" data-value="Surinam">Surinam</option>
                  <option value="216" data-value="Tailandia">Tailandia</option>
                  <option value="217" data-value="Taiwan">Taiwan</option>
                  <option value="218" data-value="Tanzania">Tanzania</option>
                  <option value="219" data-value="Tayikistan">Tayikistan</option>
                  <option value="220" data-value="Territorios franceses del Sur">Territorios franceses del Sur</option>
                  <option value="221" data-value="Timor Oriental">Timor Oriental</option>
                  <option value="222" data-value="Togo">Togo</option>
                  <option value="223" data-value="Tonga">Tonga</option>
                  <option value="224" data-value="Trinidad y Tobago">Trinidad y Tobago</option>
                  <option value="225" data-value="Tunez">Tunez</option>
                  <option value="226" data-value="Turkmenistan">Turkmenistan</option>
                  <option value="227" data-value="Turquia">Turquia</option>
                  <option value="228" data-value="Tuvalu">Tuvalu</option>
                  <option value="229" data-value="Ucrania">Ucrania</option>
                  <option value="230" data-value="Uganda">Uganda</option>
                  <option value="231" data-value="Uruguay">Uruguay</option>
                  <option value="232" data-value="Uzbekistan">Uzbekistan</option>
                  <option value="233" data-value="Vanuatu">Vanuatu</option>
                  <option value="234" data-value="Venezuela">Venezuela</option>
                  <option value="235" data-value="Vietnam">Vietnam</option>
                  <option value="236" data-value="Yemen">Yemen</option>
                  <option value="237" data-value="Yugoslavia">Yugoslavia</option>
                  <option value="238" data-value="Zambia">Zambia</option>
                  <option value="239" data-value="Zimbabue">Zimbabue</option>
                </select>
                <p id="p-pai" class="error"></p>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12">
                <label class="licki">idioma</label>
                <select class="form-control" disabled="" id="select_idioma" name="idioma">
                </select>
                
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <label class="licki">Fecha de Nacimiento</label>
                <input type="date" id="eda-form" disabled="" name="edad" value="<?php echo $eda;?>" class="form-control" placeholder="Edad"  />
                <p id="p-eda" class="error"></p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <label class="licki">Contacto <span id="span"> </span></label>
                
                <textarea maxlength="64" id="con-form" disabled="" name="contacto" class="form-control alto" placeholder="Contacto"><?php echo $con;?></textarea>
                <p id="p-con" class="error"></p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <label class="licki">Descripcion <span id="span2"> </span></label>
                <textarea maxlength="320" name="des_form" id="des-form" rows="2" placeholder="Descripcion" disabled class="form-control"><?php echo $des;?></textarea>
                <p id="p-des" class="error"></p>
            </div>
        </div>

        <div class="row">
            <div class="col col-xs-5 col-xs-offset-1 col-sm-6 col-sm-offset-0">
                <a href="p1.php"><button id="atras" type="button" class="btn btn-lg  btn-block cancel-btn">Atras</button></a> 
            </div>
            <div class="col-xs-5 col-sm-6">
                  <button id="edit2" type="button" title="Editar" class="btn btn-lg btn-primary btn-block btn-create right">Editar</button>
            </div>
            
        </div>

        <div class="row hidden" id="btnedit">


           <div class="col-xs-5 col-xs-offset-1 col-sm-6 col-sm-offset-0">
                   <a href="p2.php"><button type="button" id="atr" class="btn btn-lg  btn-block cancel-btn">Cancelar</button></a>
            </div>
            <div class="col-xs-5 col-sm-6">
                   
                  <button id="btn_guardar" class="btn btn-lg btn-primary btn-block signup-btn" data-toggle="modal" data-target="#modal_error" type="submit">Guardar</button>

            </div>

        </div> 
    </form>
<!-- ventana modal _______________________________________________________________________________________________________ -->
      <div class="modal fade" id="modal_error" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
        <div class="modal-dialog">
          <div id="mensaje_modal" class="modal-body"></div>
        </div>
      </div>
<!-- _____________________________________________________________________________________________________________________ -->

    </div>
    </header>
    <script
              src="https://code.jquery.com/jquery-3.2.1.min.js"
              integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
              crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/funciones.js"></script>
    <script src="https://apis.google.com/js/platform.js?onload=onLoad" async defer></script>
    <script src="js/scrips.js"></script>
    <script src="js/fancywebsocket.js"></script>
</body>
</html>