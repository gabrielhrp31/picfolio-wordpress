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
			<input type="text" class="form-control form-control-lg" id="nome" name="nome" placeholder="Nome">
            <div class="invalid-feedback">
            </div>
		</div>
		<div class="col-12 my-3">
			<input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="email@exemplo.com">
            <div class="invalid-feedback">
            </div>
		</div>
		<div class="col-12 my-3">
			<input type="text" class="form-control form-control-lg" id="event_type" name="event_type" placeholder="Tipo de Evento">
            <div class="invalid-feedback">
            </div>
		</div>
        <div class="col-6 my-3">
            <input type="text" class="form-control form-control-lg" id="duracao" name="duracao" placeholder="Duração(Horas)">
            <div class="invalid-feedback">
            </div>
        </div>
        <div class="col-6 my-3">
            <input type="date" class="form-control form-control-lg" id="data" name="data" placeholder="Data">
            <div class="invalid-feedback">
            </div>
        </div>
		<div class="col-12 my-3">
			<input type="text" class="form-control form-control-lg" id="telefone" name="telefone" data-inputmask="'mask':'(99) 99999-9999'" placeholder="Telefone">
            <div class="invalid-feedback">
            </div>
		</div>
		<div class="col-12 my-3">
            <textarea class="form-control form-control-lg" id="descricao" name="descricao" placeholder="Descrição" rows="4"></textarea>
            <div class="invalid-feedback">
            </div>
		</div>
		<div class="col-12 my-3">
			<button type="submit" class="btn btn-primary float-right py-2 px-4">
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

        function clear_errors(){
            var inputs = $('#contact-form input,#contact-form textarea');
            for (var input of inputs){
                $(input).removeClass('is-invalid');
                $(input).parent().children('.invalid-feedback').first().html();
            }
        }

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
                Object.keys(result.errors).forEach(function(k){
                    clear_errors();
                    setTimeout(function () {
                        $(`#${k}`).addClass("is-invalid").parent().children('.invalid-feedback').first().html(result.errors[k]);
                    },100);
                    console.log(k + ' - ' + result.errors[k]);
                });
            });
        });
    });
</script>