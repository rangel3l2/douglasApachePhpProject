<main>
  <div class="container">
    <div class="row">
      <div class="col-8 offset-2" style="margin-top:100px">

		<?php
 
		

		$id = $data['funcionarios'][0]['id'];
		$nome = $data['funcionarios'][0]['nome'];
		$email =  $data['funcionarios'][0]['email'];
		$celular =  $data['funcionarios'][0]['celular'];
		$endereco =  $data['funcionarios'][0]['endereco'];
		$cargo =  $data['funcionarios'][0]['cargo'];
		$urlFoto =  $data['funcionarios'][0]['url_foto'];
		$dataCadastro =  $data['funcionarios'][0]['data_cadastro'];
		$status =  $data['funcionarios'][0]['status'];
		
		////nome, email, celular,endereco, cargo, url_foto, data_acesso, status
		?>
		<h2>Alterar </h2>
      
		<form method="post" action="FuncionarioView.php?acao=editar">
		<input type="text" name="txtNome" placeholder="Nome" value="<?= $nome ?>">
			
		<input type="text" name="txtEmail" placeholder="Email" value = "<?= $email ?>">

     	 <input type="text" name="txtEndereco" placeholder="Endereco" value= "<?= $endereco ?>">

     	 <input type="text" name="txtCargo" placeholder="Cargo" value="<?=$cargo?>">

		  <input type="text" name="txtCelular" placeholder="Celular" value="<?=$celular?>">

     	 <input type="text" name="txtUrlFoto" placeholder="Url Foto" value="<?= $urlFoto?>">
			
			<input type="text" name="txtDataCadastro" placeholder="DataCadastro" value="<?= $dataCadastro ?>" >
			
			<input type="text" name="txtStatus" placeholder="status" value="<?= $status ?>" >
			
			<input type="hidden" name="txtID" value="<?= $id ?>">
			
			<input type="submit" name="btnEnviar" value="Enviar">
		
		</form>
      </div>
    </div>
  </div>
</main>