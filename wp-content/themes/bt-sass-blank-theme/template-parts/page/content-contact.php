<form action="<?php echo site_url(); ?>" id="contact-form" method="POST" class="container my-4">
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
			<input type="text" class="form-control" id="event_type" name="event_type" placeholder="Tipo de Evento">
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
<script>
    $(document).ready(function () {
        $('#contact-form').submit(function (e) {
            e.preventDefault();
            var data = {
                action: 'send_contact',
                security : MyAjax.security,
                form:$('#contact-form').serialize(),
            };
            $.post(MyAjax.ajaxurl, data, function(res) {
                var result=jQuery.parseJSON( res );
                console.log(result);
            });
        });
    });
</script>