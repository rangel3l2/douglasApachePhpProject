<?php
	//nome, email, celular,endereco, cargo, url_foto, data_acesso, status
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
              <th scope="col">Email</th>
              <th scope="col">Celular</th>
              <th scope="col">Endereço</th>
              <th scope="col">Cargo</th>
              <th scope="col">url_foto</th>
              <th scope="col">data cadastro</th>

            </tr>
          </thead>
          <tbody>
            <?php foreach ($data['funcionarios'] as $user) { ?>
            <tr>
              <td><?= $user['id'] ?></td>
              <td><?= $user['nome'] ?></td>
              <td><?= $user['email'] ?></td>
              <td><?= $user['celular'] ?></td>
              <td><?= $user['endereco'] ?></td>
              <td><?= $user['cargo'] ?></td>
              <td><?= $user['url_foto'] ?></td>
              <td><?= $user['data_cadastro'] ?></td>


             
			  <td><a href="FuncionarioView.php?acao=altera&&cod=<?= base64_encode($user['id']) ?>"> Editar </a></td>
        
			  <td><a href="FuncionarioView.php?acao=exclui&&cod=<?= base64_encode($user['id']) ?>"> Excluir </a></td>
            </tr>
            <?php }?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</main>
