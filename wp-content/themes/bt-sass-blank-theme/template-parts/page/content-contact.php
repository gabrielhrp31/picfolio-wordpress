<?php


if ( isset( $_POST[ "submitted" ] ) ) {
	if ( trim( $_POST[ "nome" ] ) === "" ){
		$nameError =" Digite um Nome ";
        $hasError = true;
    }else{
	    $name = trim( $_POST[ "nome" ] );
	}
	if ( trim( $_POST[ "duracao" ] ) === "" ){
		$durationError =" Digite uma Duração ";
        $hasError = true;
    }else{
	    $duration = trim( $_POST[ "duracao" ] );
	}
	if ( trim( $_POST[ "telefone" ] ) === "" ){
		$phoneError =" Digite uma Duração ";
        $hasError = true;
    }else{
	    $phone = trim( $_POST[ "telefone" ] );
	}
	if ( trim( $_POST[ "event_type" ] ) === "" ){
		$eventTypeError =" Digite uma Duração ";
        $hasError = true;
    }else{
	    $eventType = trim( $_POST[ "event_type" ] );
	}
	if ( trim( $_POST["email"] ) === "") {
		$emailError = "Digite Um Email!";
        $hasError = true;

    } else if ( ! preg_match( "/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+.[a-z]{2,4}$/i", trim( $_POST[ "email" ] ))) {
        $emailError = "Email Invalido";
        $hasError = true;
    } else {
		$email = trim( $_POST[ "email" ] );
	}

    if ( ! isset( $hasError ) ) {
        $emailTo = get_option( ‘tz_email’ );
        if ( ! isset( $emailTo ) || ( $emailTo == ” ) ) {
            $emailTo = get_option( ‘admin_email’ );
        }
        $subject = "Contato do Site - ". $name;
        $body = "Name: $name Email: $email";
        $headers = "From:". $name . " < " . $emailTo . ">" . "rn" . "Reply - To: " . $email;
        wp_mail( $emailTo, $subject, $body, $headers );
        $emailSent = true;
    }
}
?>
<form action="<?php echo site_url(); ?>" id="contactForm" method="POST" class="container my-4">
	<div class="row">
		<div class="col-12">
			<h3 class="text-center">
				Contato
			</h3>
			<h5 class="text-center font-weight-normal my-4">
				Entre em Contato Para Realizar Seu Orçamento!
			</h5>
		</div>
	</div>
	<div class="row">
		<div class="col-12 my-3">
			<input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
		</div>
		<div class="col-12 my-3">
			<input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
		</div>
		<div class="col-12 my-3">
			<input type="text" class="form-control" id="envent_type" name="envent_type" placeholder="Tipo de Evento">
		</div>
		<div class="col-12 my-3">
			<input type="text" class="form-control" id="duracao" name="duracao" placeholder="Duração(Horas)">
		</div>
		<div class="col-12 my-3">
			<input type="text" class="form-control" id="telefone" name="telefone" placeholder="Telefone">
		</div>
		<div class="col-12 my-3">
			<button type=”submit” class="btn btn-primary float-right py-2 px-4">
				<h5 class="text-white mb-0">
					Enviar <i class="fas fa-paper-plane"></i>
				</h5>
			</button>
		</div>
        <input type=”hidden” name=”submitted” id=”submitted” value=”true” class="d-none"/>
	</div>
</form>