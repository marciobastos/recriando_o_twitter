<form method="POST">
	Nome:<br>
	<input type="text" name="name"><br><br>

	Email:<br>
	<input type="email" name="email"><br><br>

	Senha:<br>
	<input type="password" name="pwd"><br><br>

	<input type="submit" value="Cadastrar"><br>
	<?php 
	if(!empty($aviso)){
		echo $aviso;
	} ?>

</form>