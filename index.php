<!doctype html>
<html lang="en">
<head>

	<meta charset="UTF-8">
	<title>Hotmart</title>

	<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<style>
		body {
			background-color: #efefef;
		}
		footer {
			text-align: center;
			padding: 20px 0 100px 0;
		}
	</style>
	<script>
		function validate_form() {
			var member_area = $('#member_area_url');

			if ( member_area.val() != '' ) {

				$('form').attr('action', member_area.val() );
				return true;

			} else
				return false;
		}
		
		$(function() {
			$('select').material_select();
		});
	</script>

</head>
<body>

	<div class="container">

		<form method="post" onsubmit="return validate_form()">

			<div class="card">
				<div class="card-content">
					<span class="card-title">Simulador de <i>callback</i> <b>Hotmart</b></span>

					<p>
						Preencha corretamente os campos abaixo para testar o script de integração do Hotmart <> S2Members <> Mailchimp.<br>
						Se tudo correr bem, o novo usuário (que você irá cadastrar abaixo) estará na sua área de membros e no Mailchimp. 
					</p>
					<br>
					<p>
						O manual com informações dos dados abaixo pode ser visto na página do Hotmart (você precisa estar logado): <a href="https://app.hotmart.com/pages/user/advancedSettings.html" target="_blank">https://app.hotmart.com/pages/user/advancedSettings.html</a>
					</p>
					<br>
					<p>
						Antes de preencher os campos abaixo, certifique-se de que o script de integração já esteja instalado no seu servidor.<br>
						<a href="hotmart.php-1.0.zip">Clique aqui</a> para baixar o script. Basta descompactar e salvar os arquivos no mesmo servidor onde o S2Members está instalado. 
					</p>

					<br><br>

					<p>
						<b>Campos obrigatórios</b>
					</p>

					</br>

					<!-- Fields -->
					<p>
						<div class="input-field">
							<input type="url" id="member_area_url" name="member_area_url" class="validate" required>
							<label for="member_area_url">Endereço completo da área de membros</label>
						</div>
					</p>
					<p>
						<div class="input-field">
							<input type="text" name="hottok" class="validate" required>
							<label for="hottok">hottok</label>
						</div>
					</p>
					<p>
						<div class="input-field">
							<input type="text" name="prod" class="validate" required>
							<label for="prod">prod</label>
						</div>
					</p>
					<p>
						<div class="input-field">
							<input type="text" name="email" class="validate" required>
							<label for="email">email</label>
						</div>
					</p>
					<p>
						<div class="input-field">
							<input type="text" name="name" class="validate" required>
							<label for="name">name</label>
						</div>
					</p>
					<p>
						<div class="input-field">
							<input type="text" name="first_name" class="validate" required>
							<label for="first_name">first_name</label>
						</div>
					</p>
					<p>
						<div class="input-field">
							<input type="text" name="last_name" class="validate" required>
							<label for="last_name">last_name</label>
						</div>
					</p>
					<!--
					<p>
						<div class="input-field">
							<input type="text" name="hotkey" class="validate" required>
							<label for="hotkey">hotkey</label>
						</div>
					</p>
					-->
					<br>
					<p>
						Status da transação<br>
						<select name="status" required>
							<option value="" disabled selected>Escolha</option>
							<option value="completed">Compra completa</option>
							<option value="approved">Compra aprovada</option>
							<option value="refunded">Reembolso</option>
						</select>
						
					</p>

					<!--
					<br><br>
					<div class="divider"></div>
					<br><br>

					<p>
						<b>Campos opcionais</b>
					</p>

					<br>

					<p>
						<div class="input-field">
							<input type="text" name="prod_name">
							<label for="last_name">prod_name</label>
						</div>
					</p>
					<p>
						<div class="input-field">
							<input type="text" name="off">
							<label for="last_name">off</label>
						</div>
					</p>
					<p>
						<div class="input-field">
							<input type="text" name="price">
							<label for="last_name">price</label>
						</div>
					</p>
					<p>
						<div class="input-field">
							<input type="text" name="aff">
							<label for="last_name">aff</label>
						</div>
					</p>
					<p>
						<div class="input-field">
							<input type="text" name="aff_name">
							<label for="last_name">aff_name</label>
						</div>
					</p>
					
					<p>
						<div class="input-field">
							<input type="text" name="doc">
							<label for="last_name">doc</label>
						</div>
					</p>
					<p>
						<div class="input-field">
							<input type="text" name="phone_local_code">
							<label for="last_name">phone_local_code</label>
						</div>
					</p>
					<p>
						<div class="input-field">
							<input type="text" name="phone_number">
							<label for="last_name">phone_number</label>
						</div>
					</p>
					<p>
						<div class="input-field">
							<input type="text" name="address">
							<label for="last_name">address</label>
						</div>
					</p>
					<p>
						<div class="input-field">
							<input type="text" name="address_number">
							<label for="last_name">address_number</label>
						</div>
					</p>
					<p>
						<div class="input-field">
							<input type="text" name="address_country">
							<label for="last_name">address_country</label>
						</div>
					</p>
					<p>
						<div class="input-field">
							<input type="text" name="address_district">
							<label for="last_name">address_district</label>
						</div>
					</p>
					<p>
						<div class="input-field">
							<input type="text" name="address_comp">
							<label for="last_name">address_comp</label>
						</div>
					</p>
					<p>
						<div class="input-field">
							<input type="text" name="address_city">
							<label for="last_name">address_city</label>
						</div>
					</p>
					<p>
						<div class="input-field">
							<input type="text" name="address_state">
							<label for="last_name">address_state</label>
						</div>
					</p>
					<p>
						<div class="input-field">
							<input type="text" name="address_zip_code">
							<label for="last_name">address_zip_code</label>
						</div>
					</p>
					<p>
						<div class="input-field">
							<input type="text" name="transaction">
							<label for="last_name">transaction</label>
						</div>
					</p>
					<p>
						<div class="input-field">
							<input type="text" name="xcod">
							<label for="last_name">xcod</label>
						</div>
					</p>
					<p>
						<div class="input-field">
							<input type="text" name="src">
							<label for="last_name">src</label>
						</div>
					</p>
					
					<p>
						<div class="input-field">
							<input type="text" name="payment_engine">
							<label for="last_name">payment_engine</label>
						</div>
					</p>
					<p>
						<div class="input-field">
							<input type="text" name="payment_type">
							<label for="last_name">payment_type</label>
						</div>
					</p>
					
					<p>
						<div class="input-field">
							<input type="text" name="name_subscription_plan">
							<label for="last_name">name_subscription_plan</label>
						</div>
					</p>
					<p>
						<div class="input-field">
							<input type="text" name="subscriber_code">
							<label for="last_name">subscriber_code</label>
						</div>
					</p>
					<p>
						<div class="input-field">
							<input type="text" name="recurrency_period">
							<label for="last_name">recurrency_period</label>
						</div>
					</p>
					<p>
						<div class="input-field">
							<input type="text" name="recurrency">
							<label for="last_name">recurrency</label>
						</div>
					</p>
					<p>
						<div class="input-field">
							<input type="text" name="cms_marketplace">
							<label for="last_name">cms_marketplace</label>
						</div>
					</p>
					<p>
						<div class="input-field">
							<input type="text" name="cms_vendor">
							<label for="last_name">cms_vendor</label>
						</div>
					</p>
					<p>
						<div class="input-field">
							<input type="text" name="cms_aff">
							<label for="last_name">cms_aff</label>
						</div>
					</p>
					<p>
						<div class="input-field">
							<input type="text" name="callback_type">
							<label for="last_name">callback_type</label>
						</div>
					</p>
					<p>
						<div class="input-field">
							<input type="text" name="subscription_status">
							<label for="last_name">subscription_status</label>
						</div>
					</p>
					<p>
						<div class="input-field">
							<input type="text" name="transaction_ext">
							<label for="last_name">transaction_ext</label>
						</div>
					</p>
					<p>
						<div class="input-field">
							<input type="text" name="sck">
							<label for="last_name">sck</label>
						</div>
					</p>
					<p>
						<div class="input-field">
							<input type="text" name="purchase_date">
							<label for="last_name">purchase_date</label>
						</div>
					</p>
					<p>
						<div class="input-field">
							<input type="text" name="confirmation_purchase_date">
							<label for="last_name">confirmation_purchase_date</label>
						</div>
					</p>
					<p>
						<div class="input-field">
							<input type="text" name="billet_url">
							<label for="last_name">billet_url</label>
						</div>
					</p>
					<p>
						<div class="input-field">
							<input type="text" name="billet_barcode">
							<label for="last_name">billet_barcode</label>
						</div>
					</p>
					<p>
						<div class="input-field">
							<input type="text" name="currency_code_from">
							<label for="last_name">currency_code_from</label>
						</div>
					</p>
					<p>
						<div class="input-field">
							<input type="text" name="original_offer_price">
							<label for="last_name">original_offer_price</label>
						</div>
					</p>
					<p>
						<div class="input-field">
							<input type="text" name="original_cms_aff">
							<label for="last_name">original_cms_aff</label>
						</div>
					</p>
					<p>
						<div class="input-field">
							<input type="text" name="warranty_date">
							<label for="last_name">warranty_date</label>
						</div>
					</p>
					<p>
						<div class="input-field">
							<input type="text" name="full_price">
							<label for="last_name">full_price</label>
						</div>
					</p>
					-->
					<!-- end Fields -->

				</div>
				<div class="card-action">
					<button type="submit" class="waves-effect waves-light btn"><i class="material-icons left">done</i> Enviar Teste</button>
				</div>
			</div>

		</form>

	</div>

	<footer>
		&copy; <?php echo date('Y'); ?>. Lucas Moreira<br>
		Visite meu blog: <a href="https://lucasmoreira.com.br">https://lucasmoreira.com.br</a>
	</footer>

</body>
</html>