
<main>
  <div class="container">
    <div class="row">
      <div class="col-8 offset-2" style="margin-top:100px">
     <h2>Cadastrar </h2>
		<form method="post" action="ContatosView.php?acao=cadastro">
      <?php
      
		//id , titulo, contato, dataCadastro, status
      ?>
      <input type="text" name="txtTitulo" placeholder="Titulo" >
			
    <input type="text" name="txtContato" placeholder="Contato" > 	   

    <input type="date" name="txtDataCadastro" placeholder="Data Cadastro">

   
			
			<input type="submit" name="btnEnviar" value="Enviar">
		
		</form>
      </div>
    </div>
  </div>
</main>
<?php 

?>