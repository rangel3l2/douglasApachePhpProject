<main>
  <div class="container">
    <div class="row">
      <div class="col-8 offset-2" style="margin-top:100px">

		<?php
	
		

		$id = $data['produtos'][0]['id'];
		$nome = $data['produtos'][0]['nome'];
		$marca =  $data['produtos'][0]['marca'];
		$descricao =  $data['produtos'][0]['descricao'];
        $modelo =  $data['produtos'][0]['modelo'];
		$dataCadastro =  $data['produtos'][0]['data_cadastro'];
		$status =  $data['produtos'][0]['status'];
		
			//nome. marca ,descricao,  modelo , datacadastro, status, codigo
		?>
		<h2>Alterar </h2>
      
		<form method="post" action="ProdutoView.php?acao=editar">
		<input type="text" name="txtNome" placeholder="Nome" value="<?= $nome ?>">
			
		<input type="text" name="txtMarca" placeholder="Marca" value = "<?= $marca ?>">     	

     	 <input type="text" name="txtDescricao" placeholder="Descricao" value="<?=$descricao?>">

		  <input type="text" name="txtModelo" placeholder="Modelo" value="<?=$modelo?>">

     	 <input type="text" name="txtDataCadastro" placeholder="Data Cadastro" value="<?= $dataCadastro?>">	
			
			<input type="text" name="txtStatus" placeholder="status" value="<?= $status ?>" >
			
			<input type="hidden" name="txtID" value="<?= $id ?>">
			
			<input type="submit" name="btnEnviar" value="Enviar">
		
		</form>
      </div>
    </div>
  </div>
</main>