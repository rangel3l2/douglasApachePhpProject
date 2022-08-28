<main>
  <div class="container">
    <div class="row">
      <div class="col-8 offset-2" style="margin-top:100px">

		<?php
	
		

		$id = $data['contatos'][0]['id'];
		$titulo = $data['contatos'][0]['titulo'];
		$contatoss=  $data['contatos'][0]['contato'];           
		$dataCadastro =  $data['contatos'][0]['data_cadastro'];
		$status =  $data['contatos'][0]['status'];
		
				//id , titulo, contato, dataCadastro, status
		?>
		<h2>Alterar </h2>
      
		<form method="post" action="SobreView.php?acao=editar">
		<input type="text" name="txtTitulo" placeholder="Titulo" value="<?= $titulo?>">
			
		<input type="text" name="txtContato" placeholder="Contato" value = "<?= $contatoss?>">  	

     	 <input type="text" name="txtDataCadastro" placeholder="Data Cadastro" value="<?= $dataCadastro?>">	
			
			<input type="text" name="txtStatus" placeholder="status" value="<?= $status ?>" >
			
			<input type="hidden" name="txtID" value="<?= $id ?>">
			
			<input type="submit" name="btnEnviar" value="Enviar">
		
		</form>
      </div>
    </div>
  </div>
</main>