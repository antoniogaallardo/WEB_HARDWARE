<?php

    //la idea era enviar los datos del formulario a un correo de forma automatica. No funciona
    $errores = '';
    $nombre = $_POST['user_name'];
    $email = $_POST['user_email'];
    $passwd = $_POST['user_passwd'];
    $cpasswd = $_POST['user_cpasswd'];
    $header = "From: noreply@example.com" . "\r\n";
    $header .= "Reply-To: noreply@example.com" . "\r\n";
    $header .= "X-Mailer: PHP/" . phpversion();
    $volver = '<a href="https://localhost/WEB_HARDWARE/WEB_HARDWARE/registro.html">
                    <button type="submit" name="enviar">Volver</button>
                </a>';
    
    if(empty($passwd) || empty($cpasswd)){
        $errores .= "<p>Debe rellenar este campo</p>";       

    }elseif ($passwd != $cpasswd) {
        $errores .= "<p>Las contraseñas no coinciden</p>";
        
    
    }

    if(empty($errores)){
        
        $asunto = ('NUEVO REGISTRO');
        $mensaje = "Nombre: " .$nombre."<br> Email: $email<br> Contraseña: $passwd <br> Confirmada: $cpasswd";
        $mail = mail('antoniogaallardo9@gmail.com', $asunto, $mensaje, $header);
        if($mail){
            echo "Correo Enviado";
        }else{
           
            echo $volver;
        }

    }else{       
        echo $errores;
        echo $volver;
    }
    
    
    


?>
