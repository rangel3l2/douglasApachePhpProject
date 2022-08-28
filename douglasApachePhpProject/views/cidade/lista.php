<?php
	//id , textoCidade,  textoMissao,textoVisao, textoValores, dataCadastro, status
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
              <th scope="col">Nome</th>

            </tr>
          </thead>
          <tbody>
            <?php foreach ($data['cidades'] as $user) { ?>
            <tr>
              <td><?= $user['id'] ?></td>
              <td><?= $user['nome'] ?></td>
              
			  <td><a href="CidadeView.php?acao=altera&&cod=<?= base64_encode($user['id']) ?>"> Editar </a></td>
        
			  <td><a href="CidadeView.php?acao=exclui&&cod=<?= base64_encode($user['id']) ?>"> Excluir </a></td>
            </tr>
            <?php }?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</main>
