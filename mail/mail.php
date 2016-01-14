<?php 

	$recipient = "andrew@luckyme.mx";
	$subject = "Mensaje de Contacto desde rivasfregoso.com";


	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$message = $_POST['message'];

	$email_from = "tester@luckyideas.mx";

	$formcontent="De: $name \n Teléfono: $phone \n Mensaje: $message";
	$mailheader = "From: $email_from \r\n";
	$mail_sent = mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
	

	if ($mail_sent == true){ ?>
		<script language="javascript" type="text/javascript">
			alert('Mensaje enviado');
			window.location = '../index.php';
		</script>
	<?php } else { ?>

		<script type="text/javascript">
			alert('Mensaje no enviado, consulta al administrador.');
			window.location = '../index.php';
		</script>
		
	<?php 
	} 
	?>