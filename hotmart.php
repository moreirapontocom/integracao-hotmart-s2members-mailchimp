<?php
/**
 * 
 * Integração com Área de Membros, Mailchimp e Hotmart
 * Autor: Lucas Moreira
 * Email: moreirapontocom@gmail.com
 * Site pessoal: http://lucasmoreira.com.br/
 * Blog: http://webemfoco.com.br/
 * 
 * O que este script faz: Integra o Hotmart a uma área de membros
 * feita com o S2Members para Wordpress e o Mailchimp.
 * 
 * Se tiver alguma dúvida ou encontrou algum problema neste código entre em contato.
 * Se este script lhe foi útil, você pode me pagar um café pelo Paypal: moreirapontocom@gmail.com
 * Compartilhe a página deste script com seus amigos!
 * 
 * Lembre-se de testar a integração em http://labs.lucasmoreira.com.br/integracao-hotmart/
 * 
 */

$debug = true;

// Integração Mailchimp
$apikey_mailchimp	= ''; // API key
$lista_leads		= ''; // ID da lista de leads
$lista_clientes		= ''; // ID da lista de clientes
$lista_reembolso	= ''; // ID da lista de reembolsados

// Integração S2members
$apikey_s2member = ''; // API key do S2Members

// Integração Hotmart
$token_hotmart		= ''; // Token Hotmart
$id_produto_hotmart	= ''; // ID do produto no Hotmart

// URL da área de membros (onde o S2Members está instalado)
// Deve estar exatamente neste formato: http://url-completa.com/
$url_area_de_membros = 'http://url-completa.com/';

/**
 * 
 * Pronto.
 * Não é necessário alterar mais nada.
 * Se for mexer, tenha certeza de saber o que está fazendo!
 * 
 */
if ( $debug ) {error_reporting(E_ALL);ini_set('display_errors', -1);}$status = $_POST['status'];$email_post = $_POST['email'];$first_name = ucfirst(mb_strtolower($_POST['first_name'], 'UTF-8'));$last_name_formatted = explode(" ", $_POST['last_name']);$last_name = ucfirst(mb_strtolower($last_name_formatted[0], 'UTF-8'));$product_ID = $_POST['prod'];$token = $_POST['hottok'];require "MCAPI.class.php";if ( $product_ID == $id_produto_hotmart && $token == $token_hotmart ) {$i_mc = new MCAPI($apikey_mailchimp);if ( $status == 'completed' or $status == 'approved' ) {$i_mc->listSubscribe($lista_clientes, $email_post, array('FNAME' => $first_name, 'LNAME' => $last_name), 'html', false, true, false, false);$info = $i_mc->listMemberInfo($lista_leads, $email_post);if ( $info['errors'] == 0 ) {$i_mc->listUnsubscribe($lista_leads, $email_post, false, false, false);}$op["op"] = "create_user";$op["api_key"] = $apikey_s2member;$op["data"] = array ("user_login" => $email_post,"user_pass" => "","user_email" => $email_post,"s2member_level" => "2","notification" => "1","opt_in" => "1","first_name" => $first_name,"last_name" => $last_name);$s = curl_init(); curl_setopt($s,CURLOPT_URL,"$url_area_de_membros?s2member_pro_remote_op=1"); curl_setopt($s,CURLOPT_RETURNTRANSFER,true); curl_setopt($s,CURLOPT_POST,true); curl_setopt($s,CURLOPT_POSTFIELDS,array('s2member_pro_remote_op' => serialize($op))); $result = curl_exec($s);curl_close($s); if ( $debug ) {echo __LINE__;echo '<br>';echo $result;}} elseif ( $status == 'refunded' ) {$i_mc->listUnsubscribe($lista_clientes, $email_post, false, false, false);if ( !empty($lista_reembolso) ) {$i_mc->listSubscribe($lista_reembolso, $email_post, array('FNAME' => $first_name, 'LNAME' => $last_name), 'html', false, true, false, false);}$op["op"] = "delete_user";$op["api_key"] = $apikey_s2member;$op["data"] = array ("user_login" => $login_do_usuario);$post_data = stream_context_create(array ("http" => array ("method" => "POST", "header" => "Content-type: application/x-www-form-urlencoded", "content" => "s2member_pro_remote_op=" . urlencode (serialize ($op)))));$result = trim (file_get_contents ("$url_area_de_membros?s2member_pro_remote_op=1", false, $post_data));if ( $debug ) {echo __LINE__;echo '<br>';echo $result;}}exit;} else {if ( $debug ) {echo __LINE__;echo '<br>';echo '$product_ID: '.$product_ID;echo '<br>';echo '$id_produto_hotmart: '.$id_produto_hotmart;echo '<br>';echo '$token: '.$token;echo '<br>';echo '$token_hotmart: '.$token_hotmart;echo '<br><br>';}exit;}if ( $debug ) {echo '<pre>';print_r($_POST);echo '</pre>';}die('Voc&ecirc; n&atilde;o possui permiss&otilde;es para acessar essa p&aacute;gina.');

