<?php
	$email = htmlspecialchars(json_decode(file_get_contents('php://input'), true)['email']);
	$massage = htmlspecialchars(json_decode(file_get_contents('php://input'), true)['massage']);

	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		$email='';
		$massage='';
	}

	header('Access-Control-Allow-Headers: Content-Type');
	header('Content-Type: text/html; charset=utf-8');
	header('Access-Control-Allow-Origin: *');

	if($email != '' && $massage != ''){
		mail('info@maxivents.com', 'Anfrage von ' . $email, $massage, 'From: ' . $email);
	
		echo '<div style="padding: 10px; border-radius: 10px; background-color: #6bd425;">Ihre Nachricht wurde versendet.<div>';
	} else {
		echo '<div style="padding: 10px; border-radius: 10px; background-color: #9b1d20;">Es ist ein Fehler eingetreten. Bitte überprüfen Sie Ihre Eingaben und senden Sie Ihre Nachricht erneut.<div>';
	}
?>
