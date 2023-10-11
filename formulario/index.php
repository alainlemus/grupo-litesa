<html>
<head>
<title>Prueba</title>
</head>
<body>


		<?php
$correo = "cuenta@dominio.com";
$nombre = isset ($_REQUEST['nombre']) ? $_REQUEST['nombre'] : '';
$ap_pat = isset ($_REQUEST['ap_pat']) ? $_REQUEST['ap_pat'] : '';
$email = isset ($_REQUEST['email']) ? $_REQUEST['email'] : '';
$telefono = isset ($_REQUEST['telefono']) ? $_REQUEST['telefono'] : '';
$mensaje = isset ($_REQUEST['mensaje']) ? $_REQUEST['mensaje'] : '';

$submit = isset ($_REQUEST['submit']) ? $_REQUEST['submit'] : '';
$pasar = true;
   if ($submit != "") {
	  if ($nombre != "" && $email != "") {

			   $pasar = false;
			   
			   
			   //------------- envio de correo ---------------------------------------------------------------------------------------------
				?>
			   <div class='tituloSeleccion' id="backtitle1" >
				 <div id="descripcion" class="text_link">
				   <p>Gracias por Contactarnos</p>
				 <!-- -->
				</div>
			  </div>
			  <div id="partidas">
				  
				  <table class="formulario">
				  <tr>
					 <td class="td">El correo se ha enviado sin problema alguno.</td>
				  </tr>
				  <tr>
					<td class="td">Para regresar entra <a href="index.php">aqu&iacute;</a>
				   </td>
				  </tr>
				  </table>
				  <br><br>
			  </div>
			  <?php
				include("mailer.php");
				$subject = "Correo desde tu sitio web ";
				$body = "<b>Te ha llegado un nuevo correo desde tu sitio web</b><br><br>".
						
						"<br><br>Nombre: <strong>$nombre</strong><br><br>".
						"<br><br>Apellido: <strong>$ap_pat</strong><br><br>".
						"<br><br>Email: <strong>$email</strong><br><br>".
						"<br><br>Telefono: <strong>$telefono</strong><br><br>".
						"<br><br>Mensaje: <strong>$mensaje</strong><br><br>";
						
						
				
				envio_email($correo,$subject,$body);
			   ?>
			  
			   <?php
			}
		 }

	  
	
   if ($pasar == true) {
	?>
		
			<form action="index.php" method="post" name="form" >
			  
			  <table class="formulario">
			  <tr>
				 <td class="td">Nombre(s)</td>
				 <td ><input type="text" name="nombre" id="nombre" class="text" size="50" maxlength="50" ></td>
			  </tr>
			  <tr>
				 <td class="td">Apellido(s)</td>
				 <td ><input type="text" name="ap_pat" id="ap_pat" class="text" size="50" maxlength="50" ></td>
			  </tr>
			  <tr>
				 <td class="td">Email</td>
				 <td ><input type="text" name="email" id="email" class="text" size="50" maxlength="50"></td>
			  </tr>
			  <tr>
				 <td class="td">Tel&eacute;fono</td>
				 <td ><input type="text" name="telefono" id="telefono" class="text" size="20" maxlength="20"></td>
			  </tr>
			  <tr>
				 <td class="td">Mensaje:</td>
				 <td > <textarea name="mensaje" id="mensaje" cols="50"  rows="5" size ="50"></textarea></td>
			  </tr>
			  
			  <tr>
				 <td colspan="2" align="right">
					<input id="submit" name="submit" type="submit">
				 </td>
			  </tr>
			  </table>
			</form>
	<?php 
	}?>
	</div> <!-- .post -->
	</div>
</div>
<body>
<html>