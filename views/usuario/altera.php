<main>
  <div class="container">
    <div class="row">
      <div class="col-8 offset-2" style="margin-top:100px">

		<?php
	 $ArrayErros	= array(
			'mensagem1' => 'não tem dados',
			'mensagem2' => 'usuario não cadastrado',
			'mensagem3' => 'Id não cadastrado',
			'mensagem4' => 'senha não cadastrada',
			'mensagem5' => 'status não cadastrado'

		); 
		

		$id = $data['usuarios'][0]['id'];
		$usuario = $data['usuarios'][0]['usuario'];
		$senha =  $data['usuarios'][0]['senha'];
		$acesso =  $data['usuarios'][0]['ultimo_acesso'];
		$status =  $data['usuarios'][0]['status'];
		
		
		?>
		<h2>Alterar </h2>

		<form method="post" action="UsuarioView.php?acao=editar">
			<input type="text" name="txtUsuario" placeholder="Nome" value="<?= $usuario  ?>">
			
			<input type="password" name="txtSenha" placeholder="Senha" value="<?= $senha ?>">
			
			<input type="text" name="txtDataAcesso" placeholder="DataAcesso" value="<?= $acesso ?>" >
			
			<input type="text" name="txtStatus" placeholder="status" value="<?= $status ?>" >
			
			<input type="hidden" name="txtID" value="<?= $id ?>">
			
			<input type="submit" name="btnEnviar" value="Enviar">
		
		</form>
      </div>
    </div>
  </div>
</main>