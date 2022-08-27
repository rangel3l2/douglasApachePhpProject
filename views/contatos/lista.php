<?php
		//id , titulo, contato, dataCadastro, status
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
              <th scope="col">Titulo</th>              
              <th scope="col">Contato</th>                                  
              <th scope="col">Data Cadastro</th>              

            </tr>
          </thead>
          <tbody>
            <?php foreach ($data['contatos'] as $user) { ?>
            <tr>             
              <td><?= $user['id'] ?></td>
              <td><?= $user['titulo'] ?></td>
              <td><?= $user['contato'] ?></td>             
              <td><?= $user['data_cadastro'] ?></td>            


             
			  <td><a href="ContatosView.php?acao=altera&&cod=<?= base64_encode($user['id']) ?>"> Editar </a></td>
        
			  <td><a href="ContatosView.php?acao=exclui&&cod=<?= base64_encode($user['id']) ?>"> Excluir </a></td>
            </tr>
            <?php }?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</main>
