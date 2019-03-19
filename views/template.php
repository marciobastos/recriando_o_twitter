<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Recriando o Twitter</title>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/template.css">
		<script type="text/javascript" href="<?php echo BASE_URL; ?>assets/js/jquery.min.js"></script>
		<script type="text/javascript" href="<?php echo BASE_URL; ?>assets/js/script.js"></script>
	</head>
	<body>
		<div class="topo">
			<div class="topoint">
				<div class="topoleft">TWITTER</div>
				<div class="toporight"><?php echo $viewData['nome']; ?>-<a href="/phpDoZero/php_2019/recriando_o_twitter/login/sair">Sair</a></div>
				<div style="clear:both"></div>
			</div>
		</div>
		<div class="container">
		<?php
		$this->loadViewInTemplate($viewName, $viewData);
		?>
		</div>
	</body>
</html>