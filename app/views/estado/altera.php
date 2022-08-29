<main>
  <div class="container">
    <div class="row">
      <div class="col-8 offset-2" style="margin-top:100px">

		<?php
	
		

		$id = $data['estados'][0]['id'];
		$estado = $data['estados'][0]['nome'];
		$sigla=  $data['estados'][0]['sigla'];
		$status =  $data['estados'][0]['status'];
		
					//id, nome , sigla, status
		?>
		<h2>Alterar </h2>
      
		<form method="post" action="EstadoView.php?acao=editar">

		<input type="text" name="txtNome" placeholder="Nome" value="<?= $estado ?>">
			
		<input type="text" name="txtSigla" placeholder="Sigla" value = "<?= $sigla ?>">   	

        <input type="text" name="txtStatus" placeholder="Status" value="<?= $status ?>" >

        <input type="hidden" name="txtID" value="<?= $id ?>">

        <input type="submit" name="btnEnviar" value="Enviar">
		
		</form>
      </div>
    </div>
  </div>
</main>