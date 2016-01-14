<?php
class email
{
	function emailWithAttach($fromAddress, $toAddress, $mailSubject, $mailMessageHead, $mailMessageMain, $mailMessageSign, $filePath, $fileName){

		$fileatt_name = $fileName;

		$fileatt = $filePath.$fileName;

		$fileatt_type = "application/octet-stream";

		$email_from = $fromAddress;

		$email_subject = $mailSubject;

		$email_message = $mailMessageHead. "<br>";
		$email_message .= $mailMessageMain. "<br>";
		$email_message .= $mailMessageSign;

		$email_to = $toAddress;

		$headers = "From: ".$email_from;

		$file = fopen($fileatt, 'rb');
		$data = fread($file,filesize($fileatt));
		fclose($file);

		$semi_rand = md5(time());
		$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";

		$headers .= "\nMIME-Version: 1.0\n" .
		"Content-Type: multipart/mixed;\n" .
		" boundary=\"{$mime_boundary}\"";

		$email_message .= "This is a multi-part message in MIME format. \n\n" .
		"--{$mime_boundary}\n" .
		"Content-Type:text/html; charset=\"iso-8859-1\"\n" .
		"Content-Transfer-Encoding: 7bit\n\n" .
		$email_message .= "\n\n";

		$data = chunk_split(base64_encode($data));

		$email_message .= "--{$mime_boundary}\n" .
		"Content-Type: {$fileatt_type};\n" .
		" name=\"{$fileatt_name}\"\n" .
		"Content-Transfer-Encoding: base64\n\n" .
		$data .= "\n\n" .
		"--{$mime_boundary}--\n";


		if(@mail($email_to, $email_subject, $email_message, $headers))
		{
			return true;
		}
	}
}

?>