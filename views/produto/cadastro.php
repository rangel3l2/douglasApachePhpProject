
<main>
  <div class="container">
    <div class="row">
      <div class="col-8 offset-2" style="margin-top:100px">
     <h2>Cadastrar </h2>
		<form method="post" action="ProdutoView.php?acao=cadastro">
      <?php
      
	//nome. marca ,descricao,  modelo , datacadastro, status, codigo
      ?>
        <input type="text" name="txtNome" placeholder="Nome">

        <input type="text" name="txtMarca" placeholder="Marca">

        <input type="text" name="txtDescricao" placeholder="Descrição">

        <input type="text" name="txtModelo" placeholder=" Modelo">

        <input type="date" name="txtDataCadastro" placeholder="Data Cadastro">

   
			
			<input type="submit" name="btnEnviar" value="Enviar">
		
		</form>
      </div>
    </div>
  </div>
</main>
<?php 

?>