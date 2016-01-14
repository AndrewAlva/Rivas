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

	//get file details we need
    $file_tmp_name    = $_FILES['CV']['tmp_name'];
    $file_name        = $_FILES['CV']['name'];
    $file_size        = $_FILES['CV']['size'];
    $file_type        = $_FILES['CV']['type'];
    $file_error       = $_FILES['CV']['error'];


	$message =  "DATOS DEL ASPIRANTE \n
		Nombre: $name \n 
		Edad: $age \n 
		Correo: $mail \n 
		Teléfono: $phone \n 
		Dirección: $address \n 
		Cuenta con auto propio: $car \n 
		Programas manejados: $programs \n 
		Carrera: $career \n \n

		GRADO DE ESTUDIOS \n
		Estudiante universitario: $student \n 
		Licenciatura: $bachelor \n 
		Maestría: $master \n \n

		EXPERIENCIA PROFESIONAL \n
		Nombre de la empresa: $experience \n 
		Fecha de ingreso: $dayIn / $monthIn / $yearIn \n 
		Fecha de Salida: $dayOut / $monthOut / $yearOut \n \n

		Descripción de actividades: $activities";

	//read from the uploaded file & base64_encode content for the mail
    $handle = fopen($file_tmp_name, "r");
    $content = fread($handle, $file_size);
    fclose($handle);
    $encoded_content = chunk_split(base64_encode($content));


        $boundary = md5("sanwebe");
        $semi_rand = md5(time());
		$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";
        //header
        $mailheader = "MIME-Version: 1.0\r\n"; 
        $mailheader .= "From:".$mail."\r\n"; 
        $mailheader .= "Reply-To: ".$mail."" . "\r\n";
        $mailheader .= "Content-Type: multipart/mixed; boundary = $boundary\r\n\r\n"; 
        
        //plain text 
        $formcontent = "--$boundary\r\n";
        $formcontent .= "Content-Type: text/plain; charset=utf-8\r\n";
        $formcontent .= "Content-Transfer-Encoding: base64\r\n\r\n"; 
        $formcontent .= chunk_split(base64_encode($message)); 
        
        //attachment
        $formcontent .= "--$boundary\r\n";
        $formcontent .="Content-Type: $file_type; name=\"$file_name\"\r\n";
        $formcontent .="Content-Disposition: attachment; filename=\"$file_name\"\r\n";
        $formcontent .="Content-Transfer-Encoding: base64\r\n";
        $formcontent .="X-Attachment-Id: ".rand(1000,99999)."\r\n\r\n"; 
        $formcontent .= $encoded_content;


	$mail_sent = mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
	

	if ($mail_sent == true){ ?>
		<script language="javascript" type="text/javascript">
			alert('Mensaje enviado');
			window.location = '../index.php';
		</script>
	<?php } else { ?>

		<script type="text/javascript">
			alert('Mensaje no enviado, intenta de nuevo en unos momentos o consulta al administrador.');
			window.location = '../index.php';
		</script>
		
	<?php 
	} 
	?>