<?php 
  
  require("class.phpmailer.php");

  $nombre = utf8_decode($_REQUEST['nombre']);
  $telefono = $_REQUEST['telefono'];
  $correo = $_REQUEST['email'];
  $mensaje = utf8_decode($_REQUEST['comentarios']);

  //echo "regreso";
  
  // CONFIGURACION CORREO
              
              $mail = new PHPMailer();
              $mail->IsSMTP();
              $mail->SMTPAuth = true;
              $mail->Host = "mail.grupolitesa.com"; // SMTP a utilizar. cambiar mail.neubox.net por smtp.tudomionio.com (donde tudomionio.com es el dominio en el que vas a colocar este formulario)
              $mail->Username = "contacto@grupolitesa.com"; // Correo completo a utilizar, es el correo al que deseas que te lleguen los correos
              $mail->Password = "lema901006"; // Contraseña es la contraseña de la cuenta de contacto que especificaste en la linea anterior
              $mail->Port = 587; // Puerto a utilizar
              
            //$destinatario = "ejemeplo@sudominio.com";
              $destinatario = "contacto@grupolitesa.com"; // escribe aqui tu correo, es el correo al que deseas que te lleguen los correos
              $destinatario_cc = ""; // direccion de correo para copia
              $destinatario_bcc = ""; // direccion de correo para copia oculta
              
              $asunto  = "Correo enviado desde el sitio web de contacto"; 
// CONFIGURACION HTML
                  $enviado_bien = "Your form has been sent correctly, we will contact you soon.";
                  $enviado_mal  = "ERROR: Failed to send";
// RECOGER DATOS 
                  reset ($_POST);
                  $struct .= "<table border=\"-1\">";
                  /*while (list ($clave, $valor) = each ($_POST)) {
                    $clave = htmlspecialchars($clave);
                    $valor = htmlspecialchars(trim($valor));
                    $mensaje .= "<tr><th>" . $clave . "</th><td>" . $valor . "</td></tr>";
                  }*/
          $struct .= "<tr><th>Nombre:</th><td>".$nombre."</td></tr>";
          $struct .= "<tr><th>Telefono:</th><td>".$telefono."</td></tr>";
          $struct .= "<tr><th>Correo:</th><td>".$correo."</td></tr>";
          $struct .= "<tr><th>Mensaje:</th><td>".$mensaje."</td></tr>";
                  $struct .= "<tr><th>Fecha peticion:</th><td>" . date("d/m/Y H:i:s") . "</td></tr>";
                  $struct .= "</table>";

          
                  if ($email!= "") {
                      $mail->From = $email; //Dirección del remitente
                      $mail->FromName = $nombre; //Nombre del remitente
                  }
                  if ($destinatario_cc != "") 
                      $mail->AddCC($destinatario_cc); // Copia
                  if ($destinatario_bcc != "") 
                      $mail->AddBCC($destinatario_bcc); // Copia oculta
                  
                  $mail->IsHTML(true); // El correo se envía como HTML
                  $mail->Subject = $asunto;
                  $mail->AddAddress($destinatario); // Esta es la dirección a donde enviamos
                  
                  $mail->Body = $struct;
                  if ($mail->Send()) {
                    echo "<script>
              alert('$enviado_bien');
              location.reload(true);
              </script>";
                  } else {
                    echo "<script>
              alert('$enviado_mal');  
              </script>";
                  }
                

?>