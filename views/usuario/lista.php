<?php

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
              <th scope="col">Usuário</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($data['usuarios'] as $user) { ?>
            <tr>
              <td><?= $user['id'] ?></td>
              <td><?= $user['usuario'] ?></td>
			  <td><a href="UsuarioView.php?acao=altera&&cod=<?= base64_encode($user['id']) ?>"> Editar </a></td>
        
			  <td><a href="UsuarioView.php?acao=exclui&&cod=<?= base64_encode($user['id']) ?>"> Excluir </a></td>
            </tr>
            <?php }?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</main>
