
<main>
  <div class="container">
    <div class="row">
      <div class="col-8 offset-2" style="margin-top:100px">
     <h2>Cadastrar </h2>
		<form method="post" action="SobreView.php?acao=cadastro">
      <?php
      
	//id , textoSobre,  textoMissao,textoVisao, textoValores, dataCadastro, status
      ?>
        <input type="text" name="textoSobre" placeholder="Sobre">

        <input type="text" name="textoMissao" placeholder="MIssão">

        <input type="text" name="textoVisao" placeholder="Visão">

        <input type="text" name="textoValores" placeholder=" Valores">

        <input type="date" name="txtDataCadastro" placeholder="Data Cadastro">

   
			
			<input type="submit" name="btnEnviar" value="Enviar">
		
		</form>
      </div>
    </div>
  </div>
</main>
<?php 

?>