<?php
	function send_mail_setup(PHPMailer $phpmailer) {
		$phpmailer->IsSMTP();
		$phpmailer->Host = 'mail.juliarezendefotografia.com.br';
		$phpmailer->SMTPAuth = true;
		$phpmailer->SMTPSecure = 'ssl';
		$phpmailer->Port = 465;
		$phpmailer->Username = 'contato@juliarezendefotografia.com.br';
		$phpmailer->Password = '020716';
	}

	add_action('phpmailer_init', 'send_mail_setup');

	function send_contact_callback() {
		check_ajax_referer( 'my-special-string', 'security' );
		 parse_str($_POST["form"], $form);
		$errors =  array();
		if ( trim( $form[ "nome" ] ) === "" ){
			$errors['nome'] =" Digite um Nome ";
			$hasError = true;
		}else{
			$name = trim( $form[ "nome" ] );
		}
		if ( trim( $form[ "duracao" ] ) === "" ){
			$errors['duracao'] =" Digite uma Duração ";
			$hasError = true;
		}else{
			$duracao = trim( $form[ "duracao" ] );
		}
		if ( trim( $form[ "descricao" ] ) === "" ){
			$errors['descricao'] =" Digite uma descrição ";
			$hasError = true;
		}else{
			$descricao = trim( $form[ "descricao" ] );
		}
		if ( trim( $form[ "telefone" ] ) === "" ){
			$errors['telefone'] =" Digite uma Duração ";
			$hasError = true;
		}else{
			$phone = trim( $form[ "telefone" ] );
		}
		if ( trim( $form[ "data" ] ) === "" ){
			$errors['data'] ="Selecione a Data do Evento";
			$hasError = true;
		}else{
			$data = trim( $form[ "data" ] );
		}
		if ( trim( $form[ "event_type" ] ) === "" ){
			$errors['event_type'] =" Digite um tipo de evento!";
			$hasError = true;
		}else{
			$eventType = trim( $form[ "event_type" ] );
		}
		if ( trim( $form["email"] ) === "") {
			$errors['email'] = "Digite Um Email!";
			$hasError = true;

		} else if ( ! preg_match( "/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+.[a-z]{2,4}$/i", trim( $form[ "email" ] ))) {
			$errors['email'] = "Email Invalido";
			$hasError = true;
		} else {
			$email = trim( $form[ "email" ] );
		}

		if ( ! isset( $hasError ) ) {
			$emailTo = get_option( "tz_email" );
			if ( ! isset( $emailTo ) || ( $emailTo == "" ) ) {
				$emailTo = get_option( "admin_email" );
			}
			$subject = "Contato do Site - ". $name;

			$headers[] = 'From:'.$email;
			$headers[]= "Content-Type: text/html; charset=UTF-8";
			ob_start();
			include(TEMPLATEPATH . '/mails/contact.html');
			$body = ob_get_contents();
			ob_end_clean();
			wp_mail( $emailTo, $subject, $body, $headers );
			$emailSent = true;
		}
		$data=array('success'=>$emailSent,'errors'=>$errors);
		echo json_encode($data);
		die(); // this is required to return a proper result
	}
	add_action( 'wp_ajax_send_contact', 'send_contact_callback' );
	add_action( 'wp_ajax_nopriv_send_contact', 'send_contact_callback' );