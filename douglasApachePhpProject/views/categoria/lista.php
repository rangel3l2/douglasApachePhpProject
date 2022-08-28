<?php
	//nome. marca ,descricao,  modelo , datacadastro, status, codigo
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
              <th scope="col">Descricão</th>                          
            
              <th scope="col">Data Cadastro</th>              

            </tr>
          </thead>
          <tbody>
            <?php foreach ($data['categorias'] as $user) { ?>
            <tr>
              <td><?= $user['id'] ?></td>
              <td><?= $user['nome'] ?></td>              
              <td><?= $user['descricao'] ?></td>           
              <td><?= $user['data_cadastro'] ?></td>            


             
			  <td><a href="CategoriaView.php?acao=altera&&cod=<?= base64_encode($user['id']) ?>"> Editar </a></td>
        
			  <td><a href="CategoriaView.php?acao=exclui&&cod=<?= base64_encode($user['id']) ?>"> Excluir </a></td>
            </tr>
            <?php }?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</main>
