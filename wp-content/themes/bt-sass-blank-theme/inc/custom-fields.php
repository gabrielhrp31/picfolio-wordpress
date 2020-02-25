<?php

$new_general_setting = new new_general_setting();


class new_general_setting {
	function new_general_setting( ) {
		add_filter( 'admin_init' , array( &$this , 'register_fields' ) );
	}

	function register_fields() {
		register_setting('general', 'instagram_field', 'esc_attr');
		add_settings_field('instagram_field', '<label for="instagram_field">'.__('Instagram URL:' , 'instagram_field' ).'</label>' , array(&$this, 'funcao_instagram_field') , 'general' );

		register_setting('general', 'whatsapp_field', 'esc_attr');
		add_settings_field('whatsapp_field', '<label for="whatsapp_field">'.__('Whatsapp:' , 'whatsapp_field' ).'</label>' , array(&$this, 'funcao_whatsapp_field') , 'general' );

		register_setting( 'general', 'facebook_field', 'esc_attr' );
		add_settings_field('facebook_field', '<label for="facebook_field">'.__('Facebook URL:' , 'facebook_field' ).'</label>' , array(&$this, 'funcao_facebook_field') , 'general' );
	}

	function funcao_facebook_field() {
		$value = get_option( 'facebook_field', '' );
		echo '<input type="url" placeholder="https://" id="facebook_field" name="facebook_field" value="' . $value . '" />';
		echo '<p><small><i>Link da Pagina ou Perfil do Facebook</i></small></p>';

	}


	function funcao_instagram_field(){
		$value = get_option( 'instagram_field', '' );
		echo '<input type="url" placeholder="https://" id="instagram_field" name="instagram_field" value="' . $value . '" />';
		echo '<p><small><i>Link do perfil do Instagram</i></small></p>';
	}

	function funcao_whatsapp_field(){
		$value = get_option( 'whatsapp_field', '' );
		echo '<input type="tel" placeholder="https://api.whatsapp.com/send?phone=5537999999999"id="whatsapp_field" name="whatsapp_field" value="' . $value . '" />';
		echo '<p><small><i>Numero do whatsapp</i></small></p>';
	}
}

