<main>
  <div class="container">
    <div class="row">
      <div class="col-8 offset-2" style="margin-top:100px">

		<?php
	
		

		$id = $data['categorias'][0]['id'];
		$nome = $data['categorias'][0]['nome'];		
		$descricao =  $data['categorias'][0]['descricao'];       
		$dataCadastro =  $data['categorias'][0]['data_cadastro'];
		$status =  $data['categorias'][0]['status'];
		
			//nome. marca ,descricao,  modelo , datacadastro, status, codigo
		?>
		<h2>Alterar </h2>
      
		<form method="post" action="CategoriaView.php?acao=editar">
		<input type="text" name="txtNome" placeholder="Nome" value="<?= $nome ?>">	
	    	
     	 <input type="text" name="txtDescricao" placeholder="Descricao" value="<?=$descricao?>">

     	 <input type="text" name="txtDataCadastro" placeholder="Data Cadastro" value="<?= $dataCadastro?>">	
			
			<input type="text" name="txtStatus" placeholder="status" value="<?= $status ?>" >
			
			<input type="hidden" name="txtID" value="<?= $id ?>">
			
			<input type="submit" name="btnEnviar" value="Enviar">
		
		</form>
      </div>
    </div>
  </div>
</main>