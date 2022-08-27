
<?php
require "../controllers/ProdutoController.php";
require  "produto/acaoView.php";


class ProdutoView
{
	public function __construct()
	{
		$this->index();
		
	}	
	
	public function index()
	{
		$produtos = new ProdutoController();
		
		$produtos->listar();
		
	}
	
	public function cadastro()
	{
		require  '../views/produto/cadastro.php';
	}
	
	public function salvarDados()
	{
		$produtos = new ProdutoController();
	//nome. marca ,descricao,  modelo , datacadastro, status, codigo
		$data['nome']    	= $_POST["txtNome"];
		$data['marca'] 		= $_POST["txtMarca"];
		$data['descricao'] 	= $_POST["txtDescricao"];
		$data['modelo'] 	= $_POST["txtModelo"];
		$data['dataCadastro'] 		= $_POST["txtDataCadastro"];
		
		
		$produtos->inserir($data);
		//var_dump($data);
		
	}
	
	public function listarDados($codigoProduto = null)
	{
		if($codigoProduto == null)
		{
			$this->index();
		}
		
		$produtos = new ProdutoController();
		
		$produtos->listarPorId($codigoProduto);
	}
	
	public function alterarDados()
	{
		$produtos = new ProdutoController();
		
	$data['nome']    	= $_POST["txtNome"];
		$data['marca'] 		= $_POST["txtMarca"];
		$data['descricao'] 	= $_POST["txtDescricao"];
		$data['modelo'] 	= $_POST["txtModelo"];
		$data['dataCadastro'] 		= $_POST["txtDataCadastro"];
		$data['codigo']		= $_POST["txtID"];
		
		
		$produtos->alterar($data);
		
	}
	
	public function excluir($codigoProduto = null)
	{
		if($codigoProduto == null)
		{
			$this->index();
		}
		
		$produtos = new ProdutoController();
				
		$produtos->excluirProduto($codigoProduto);
	}
	
}


?>