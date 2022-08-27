<main>
  <div class="container">
    <div class="row">
      <div class="col-8 offset-2" style="margin-top:100px">

		<?php
	
		

		$id = $data['sobres'][0]['id'];
		$sobre = $data['sobres'][0]['texto_sobre'];
		$missao=  $data['sobres'][0]['texto_missao'];
        $visao =  $data['sobres'][0]['texto_visao'];
		$valores =  $data['sobres'][0]['texto_valores'];      
		$dataCadastro =  $data['sobres'][0]['data_cadastro'];
		$status =  $data['sobres'][0]['status'];
		
				//id , textoSobre,  textoMissao, textoValores, dataCadastro, status
		?>
		<h2>Alterar </h2>
      
		<form method="post" action="SobreView.php?acao=editar">
		<input type="text" name="textoSobre" placeholder="Sobre" value="<?= $sobre ?>">
			
		<input type="text" name="textoMissao" placeholder="Missao" value = "<?= $missao ?>">     	

     	 <input type="text" name="textoVisao" placeholder="Visao" value="<?=$visao?>">

		  <input type="text" name="textoValores" placeholder="Valores" value="<?=$valores?>">

     	 <input type="text" name="txtDataCadastro" placeholder="Data Cadastro" value="<?= $dataCadastro?>">	
			
			<input type="text" name="txtStatus" placeholder="status" value="<?= $status ?>" >
			
			<input type="hidden" name="txtID" value="<?= $id ?>">
			
			<input type="submit" name="btnEnviar" value="Enviar">
		
		</form>
      </div>
    </div>
  </div>
</main>