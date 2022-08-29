<?php
	//id , textoSobre,  textoMissao,textoVisao, textoValores, dataCadastro, status
require_once 'header.php'?>

<main>
  <div class="container">
    <div class="row">
      <div class="col-8 offset-2" style="margin-top:100px">
        <h2>Lista</h2>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">id</th>
              <th scope="col">Sobre</th>
              <th scope="col">MIssao</th>  
              <th scope="col">Visão</th>
              <th scope="col">Valores</th>                      
              <th scope="col">Data Cadastro</th>              

            </tr>
          </thead>
          <tbody>
            <?php foreach ($data['sobres'] as $user) { ?>
            <tr>
              <td><?= $user['id'] ?></td>
              <td><?= $user['texto_sobre'] ?></td>
              <td><?= $user['texto_missao'] ?></td>
              <td><?= $user['texto_visao'] ?></td>
              <td><?= $user['texto_valores'] ?></td>
              <td><?= $user['data_cadastro'] ?></td>            


             
			  <td><a href="SobreView.php?acao=altera&&cod=<?= base64_encode($user['id']) ?>"> Editar </a></td>
        
			  <td><a href="SobreView.php?acao=exclui&&cod=<?= base64_encode($user['id']) ?>"> Excluir </a></td>
            </tr>
            <?php }?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</main>
