<main>
  <div class="container">
    <div class="row">
      <div class="col-8 offset-2" style="margin-top:100px">

		<?php
	
		

		$id = $data['cidades'][0]['id'];
		$nome = $data['cidades'][0]['nome'];
		$status =  $data['cidades'][0]['status'];
		
			
		?>
		<h2>Alterar </h2>
      
		<form method="post" action="CidadeView.php?acao=editar">
            <input type="text" name="txtNome" placeholder="Nome" value="<?= $nome ?>">        

            <input type="text" name="txtStatus" placeholder="status" value="<?= $status ?>" >

            <input type="hidden" name="txtID" value="<?= $id ?>">

            <input type="submit" name="btnEnviar" value="Enviar">
		
		</form>
      </div>
    </div>
  </div>
</main>