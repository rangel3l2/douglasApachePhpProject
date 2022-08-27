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
              <th scope="col">Marca</th>  
              <th scope="col">Descricão</th>
              <th scope="col">Modelo</th>                      
            
              <th scope="col">Data Cadastro</th>              

            </tr>
          </thead>
          <tbody>
            <?php foreach ($data['produtos'] as $user) { ?>
            <tr>
              <td><?= $user['id'] ?></td>
              <td><?= $user['nome'] ?></td>
              <td><?= $user['marca'] ?></td>
              <td><?= $user['descricao'] ?></td>
              <td><?= $user['modelo'] ?></td>
              <td><?= $user['data_cadastro'] ?></td>            


             
			  <td><a href="ProdutoView.php?acao=altera&&cod=<?= base64_encode($user['id']) ?>"> Editar </a></td>
        
			  <td><a href="ProdutoView.php?acao=exclui&&cod=<?= base64_encode($user['id']) ?>"> Excluir </a></td>
            </tr>
            <?php }?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</main>
