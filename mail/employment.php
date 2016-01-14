<?php 

	$recipient = "andrew@luckyme.mx";
	$subject = "Bolsa de Trabajo, Aspirante desde rivasfregoso.com";


	$name = $_POST['name'];

	$age = $_POST['age'];
	$mail = $_POST['mail'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$car = $_POST['car'];
	$programs = $_POST['programs'];
	$career = $_POST['career'];
	$student = $_POST['student'];
	$bachelor = $_POST['bachelor'];
	$master = $_POST['master'];
	$experience = $_POST['experience'];
	$dayIn = $_POST['dayIn'];
	$monthIn = $_POST['monthIn'];
	$yearIn = $_POST['yearIn'];
	$dayOut = $_POST['dayOut'];
	$monthOut = $_POST['monthOut'];
	$yearOut = $_POST['yearOut'];
	$activities = $_POST['activities'];
	$CV = $_POST['CV'];

	$email_from = "tester@luckyideas.mx";

	$formcontent=  "Aspirante: $name \n 
		Edad: $age \n 
		Correo: $mail \n 
		Teléfono: $phone \n 
		Dirección: $address \n 
		Cuenta con auto propio: $car \n 
		Programas manejados: $programs \n 
		Carrera: $career \n \n

		Grado de Estudios: \n
		Estudiante universitario: $student \n 
		Licenciatura: $bachelor \n 
		Maestría: $master \n \n

		Experiencia Profesional \n
		Nombre de la empresa: $experience \n 
		Fecha de ingreso: $dayIn / $monthIn / $yearIn \n 
		Fecha de Salida: $dayOut / $monthOut / $yearOut \n \n

		Descripción de actividades: $activities \n \n

		Curriculum Vitae: $CV" ;

	$mailheader = "From: $email_from \r\n";
	

	include "mail/emailClass.php";

	$testEmail = new email;
	$from       =   'andrew@luckyme.mx';
	$sendTo     =   'andrew@luckyme.mx';
	$subject    =   'Bolsa de Trabajo, Aspirante desde rivasfregoso.com';
	$bodyHead   =   'Datos del aspirante:';
	$bodyMain   =   'This is the body main text';
	$bodyEnd    =   'Fin del Mensaje';
	$filePath   =   '';
	$fileName   =   'test.png';

	if ($testEmail ->emailWithAttach($from, $sendTo, $subject, $bodyHead, $bodyMain, $bodyEnd, $filePath, $fileName))
	{
	    echo "Email Send successful";
	}
	else
	{
	    echo "Email Send Failed";
	}
	

	
?>