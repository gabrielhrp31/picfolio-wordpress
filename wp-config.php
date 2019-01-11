<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/pt-br:Editando_wp-config.php
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'juliarfotografia');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'root');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', '');

/** Nome do host do MySQL */
define('DB_HOST', 'localhost');

/** Charset do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8mb4');

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'fPyZ57vQNte~Ev|H*of`Y(<#UHoEvA5M)y7G+8RD@*j4c&v%{d*{SezW$C67qn1n');
define('SECURE_AUTH_KEY',  'vCBpalk@<k|hqm/]sU3#e&1UdS!}yqYubyhds6.)?*0)2Y,Xt+XVuCSK&&F=kRH_');
define('LOGGED_IN_KEY',    '&#?E;Av|j-_t:q7FAZAw*fr0A70^gJyDJt0BmG?Zd}{TR7)}|/}qZA3r-4LOgl>0');
define('NONCE_KEY',        'z 3}7U)Wx5f_C,r~{$ka) 9W8<3@hU=,GeM?_wg_K[=m?Ik_xvyiO<mJ/W@n$1G,');
define('AUTH_SALT',        'Q7UCCkVPh>}z%X9iCr/YY$y0/9M9Y&1bM<%z`0Z;zvZlK^eJ!s2^Nb{l/jbyfh{X');
define('SECURE_AUTH_SALT', 'gg|5%p5#wmC>))S.l0h/Xu&N08yHlhO+1BS7$*wOw*$ML7cxEtg[lD#io8w}V;Be');
define('LOGGED_IN_SALT',   '^]-8]: yaLqKc`QpO3%Y9W0:ANLA!Su:wLGv.7mft6X*WYfi OgX.qF~:$ [Ek|A');
define('NONCE_SALT',       'u[Xt,Je@<`Lb,lhr|7(wJIDna%mVTZ8WNK/?jFS.oc/!/>f8pu1{ _kErE[&6l,|');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix  = 'jrf_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://codex.wordpress.org/pt-br:Depura%C3%A7%C3%A3o_no_WordPress
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Configura as variáveis e arquivos do WordPress. */
require_once(ABSPATH . 'wp-settings.php');
