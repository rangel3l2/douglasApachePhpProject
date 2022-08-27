
<main>
  <div class="container">
    <div class="row">
      <div class="col-8 offset-2" style="margin-top:100px">
     <h2>Cadastrar </h2>
		<form method="post" action="EstadoView.php?acao=cadastro">
      <?php
      
     //id, nome , sigla, status
      ?>
        <input type="text" name="txtNome" placeholder="Estado">

        <input type="text" name="txtSigla" placeholder="Sigla">
	
        <input type="submit" name="btnEnviar" value="Enviar">
		
		</form>
      </div>
    </div>
  </div>
</main>
<?php 

?>