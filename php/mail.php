<?php
/*
phpinfo();
*/

function redirect($url)
{
    $string = '<script type="text/javascript">';
    $string .= 'window.location = "' . $url . '"';
    $string .= '</script>';

    echo $string;
};

$name = strip_tags($_POST['name']);
$email = strip_tags($_POST['email']);
$message = strip_tags($_POST['message']);

$fecha = time();
$fechaFormateada = date("j/n/Y", $fecha);

$textoEmisor = "MIME-VERSION: 1.0\r\n";
$textoEmisor .= "Content-type: text/html; charset=UTF-8\r\n";
$textoEmisor .= "From: ecosdelaspalabrasdelatierra.cl";

//Correo de destino; donde se enviará el correo.
$correoDestino = "margaritareyes@gmail.com,freddynps@gmail.com,libkolewbu@yahoo.es";
//$correoDestino = "vitocosan@gmail.com";

//Formateo el asunto del correo
$asunto = "Contacto Sitio Ecos de las Palabras de la Tierra";

//Formateo el cuerpo del correo
$cuerpo = "<h2>Ecos de las Palabras de la Tierra</h2><br />";
$cuerpo .= "<p>Un visitante del sitio a enviado el siguiente mensaje:</p>";
$cuerpo .= "<p><i>" . $message . "</i></p><br />";
$cuerpo .= "<p>Los datos del visitante son lo siguientes:</p>";
$cuerpo .= "<b>Nombre: </b>" . $name . "<br />";
$cuerpo .= "<b>Email: </b>" . $email . "<br />";
$cuerpo .= "<b>Fecha: </b>" . $fechaFormateada . "<br />";


// Envío el mensaje
mail( $correoDestino, $asunto, $cuerpo, $textoEmisor);

if(headers_sent()){
    // las cabeceras ya se han enviado, no intentar añadir una nueva
	redirect("http://ecosdelaspalabrasdelatierra.cl");
}
else{
    // es posible añadir nuevas cabeceras HTTP
	header("Location: http://ecosdelaspalabrasdelatierra.cl");
}

exit();

?>
