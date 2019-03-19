<div class="feed">
	<form method="POST">
		<textarea name="msg" class="textareapost"></textarea><br>
		<input type="submit" value="Enviar">
	</form>
	<?php foreach($feed as $item): ?>
	<strong> <?php echo $item['nome']; ?></strong> - <?php echo date('H:i', strtotime($item['data_post'])); ?><br>
	<?php echo $item['mensagem']; ?>
	<hr>
	<?php endforeach; ?>
</div>