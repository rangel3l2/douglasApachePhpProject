
<main>
  <div class="container">
    <div class="row">
      <div class="col-8 offset-2" style="margin-top:100px">
     <h2>Cadastrar </h2>
		<form method="post" action="FuncionarioView.php?acao=cadastro">
      <?php
      ////nome, email, celular,endereco, cargo, url_foto, data_acesso,
      ?>
			<input type="text" name="txtNome" placeholder="Nome">
			
			<input type="text" name="txtEmail" placeholder="Email">

      <input type="text" name="txtCelular" placeholder="Celular">

      <input type="text" name="txtCargo" placeholder="cargo">

      <input type="text" name="txtEndereco" placeholder="Endereco">

      <input type="text" name="txtUrlFoto" placeholder="Url Foto">
			
			<input type="date" name="txtDataCadastro" value="" >
			
			<input type="submit" name="btnEnviar" value="Enviar">
		
		</form>
      </div>
    </div>
  </div>
</main>
<?php 

?>