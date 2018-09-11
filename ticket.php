<?php


require __DIR__ . '/ticket/autoload.php'; //Nota: si renombraste la carpeta a algo diferente de "ticket" cambia el nombre en esta línea
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

/*
	Este ejemplo imprime un
	ticket de venta desde una impresora térmica
*/


/*
    Aquí, en lugar de "POS" (que es el nombre de mi impresora)
	escribe el nombre de la tuya. Recuerda que debes compartirla
	desde el panel de control
*/

$nombre_impresora = "xprinter";


$connector = new WindowsPrintConnector($nombre_impresora);
$printer = new Printer($connector);
/*
	Vamos a imprimir un logotipo
	opcional. Recuerda que esto
	no funcionará en todas las
	impresoras

	Pequeña nota: Es recomendable que la imagen no sea
	transparente (aunque sea png hay que quitar el canal alfa)
	y que tenga una resolución baja. En mi caso
	la imagen que uso es de 250 x 250
*/

# Vamos a alinear al centro lo próximo que imprimamos
$printer->setJustification(Printer::JUSTIFY_CENTER);

/*
	Intentaremos cargar e imprimir
	el logo
*/
try{
	$logo = EscposImage::load("logo.jpg", false);
    $printer->bitImage($logo);
}catch(Exception $e){/*No hacemos nada si hay error*/}

/*
	Ahora vamos a imprimir un encabezado
*/

$printer->text("\n"."Academic Language Institute Store" . "\n");
$printer->text("Cra 11B N°54-79" . "\n");
$printer->text("Tel: 795 12 89" . "\n");
#La fecha también
date_default_timezone_set("America/Bogota");
$printer->text(date("Y-m-d H:i:s") . "\n");
$printer->text("-----------------------------" . "\n");
$printer->setJustification(Printer::JUSTIFY_LEFT);
$printer->text("CANT  NOMBRE LIBRO   PRECIO   .\n");
$printer->text("-----------------------------"."\n");
/*
	Ahora vamos a imprimir los
	productos
*/

	/*Alinear a la izquierda para la cantidad y el nombre*/
	$printer->setJustification(Printer::JUSTIFY_LEFT);
    foreach ($_SESSION['carrito'] as $c) {
    	$printer->text("  ". $c['cantidad'] . "   " . $c['nombre'] . "   " . $c['precio'] . "\n");
    }
/*
	Terminamos de imprimir
	los productos, ahora va el total
*/
$printer->text("-----------------------------"."\n");
$printer->setJustification(Printer::JUSTIFY_RIGHT);
if($descuento != 'NULL'){
	$printer->text("DESC: %". $descuento . "\n");
	$x = $_SESSION['total'] * $descuento;
	$_SESSION['total'] = $_SESSION['total'] - $x;
}else{
	$printer->text("DESC: NN" ."\n");
}
$printer->text("TOTAL: $". $_SESSION['total'] . "\n");
$printer->text("PAGO CLIENTE: $". $pago_comprador . "\n");
$printer->text("CAMBIO: $". $cambio . "\n");


/*
	Podemos poner también un pie de página
*/
$printer->setJustification(Printer::JUSTIFY_CENTER);
$printer->text("Muchas gracias por su compra\n");



/*Alimentamos el papel 3 veces*/
$printer->feed(3);

/*
	Cortamos el papel. Si nuestra impresora
	no tiene soporte para ello, no generará
	ningún error
*/
$printer->cut();

/*
	Por medio de la impresora mandamos un pulso.
	Esto es útil cuando la tenemos conectada
	por ejemplo a un cajón
*/
$printer->pulse();

/*
	Para imprimir realmente, tenemos que "cerrar"
	la conexión con la impresora. Recuerda incluir esto al final de todos los archivos
*/
$printer->close();

$_SESSION['carrito'] = "";
$_SESSION['total'] = 0;

?>
