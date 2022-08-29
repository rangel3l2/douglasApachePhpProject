<?php
//pronto
require("../models/ProdutoModel.php");

class ProdutoController 
{

	public function listar() 
	{
		$produto = new ProdutoModel();
		
		$produtos = $produto->listarProdutos();

		$data = ['produtos' => $produtos];
      // var_dump($data);
	   if(isset ($data['status'])){
        unset($data['status']);
    }
        
	
			
		require '../views/produto/lista.php';
       

	}
	
	public function inserir($data)
	{
        //var_dump($data);
		$produto = new ProdutoModel();
		//nome. marca ,descricao,  modelo , datacadastro, status, codigo
		$produto->setNome(trim($data['nome']));
		$produto->setMarca(trim($data['marca']));
		$produto->setDescricao(trim($data['descricao']));
        $produto->setModelo(trim($data['modelo']));
		$produto->setDataCadastro(trim($data['dataCadastro']));
			
		$produto->inserirProduto();
		
		return $this->listar();
	}
	
	public function alterar($data)
	{
		$produto = new ProdutoModel();
	
		$produto->setNome(trim($data['nome']));
		$produto->setMarca(trim($data['marca']));
		$produto->setDescricao(trim($data['descricao']));
        $produto->setModelo(trim($data['modelo']));
		$produto->setDataCadastro(trim($data['dataCadastro']));
			
		
		$produto->alterarProduto($data['codigo']);
	
		return $this->listar();
		
	}
	
	public function listarPorId($codUser)
	{
		$produto = new ProdutoModel();
		$produtos = $produto->listarProdutosPorId($codUser);

		$data = ['produtos' => $produtos];

		require '../views/produto/altera.php';
		
	}
	
	public function excluirProduto($codUser)
	{
		$produto = new ProdutoModel();
		
		$produto->excluirProduto($codUser);
		
		return $this->listar();
	}

}

?>