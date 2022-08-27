
<?php
require "../controllers/CategoriaController.php";
require  "categoria/acaoView.php";


class CategoriaView
{
	public function __construct()
	{
		$this->index();
        require_once  '../views/categoria/cadastro.php';
		
	}	
	
	public function index()
	{
		$categorias = new CategoriaController();
		
		$categorias->listar();
		
	}
	
	public function cadastro()
	{
		require_once  '../views/categoria/cadastro.php';
	}
	
	public function salvarDados()
	{
		$categorias = new CategoriaController();
	//nome. marca ,descricao,  modelo , datacadastro, status, codigo
		$data['nome']    	= $_POST["txtNome"];	
		$data['descricao'] 	= $_POST["txtDescricao"];	
		$data['dataCadastro'] 		= $_POST["txtDataCadastro"];
		
		
		$categorias->inserir($data);
		//var_dump($data);
		
	}
	
	public function listarDados($codigoCategoria = null)
	{
		if($codigoCategoria == null)
		{
			$this->index();
		}
		
		$categorias = new CategoriaController();
		
		$categorias->listarPorId($codigoCategoria);
	}
	
	public function alterarDados()
	{
		$categorias = new CategoriaController();
		
	$data['nome']    	= $_POST["txtNome"];	
		$data['descricao'] 	= $_POST["txtDescricao"];		
		$data['dataCadastro'] 		= $_POST["txtDataCadastro"];
		$data['codigo']		= $_POST["txtID"];
		
		
		$categorias->alterar($data);
		
	}
	
	public function excluir($codigoCategoria = null)
	{
		if($codigoCategoria == null)
		{
			$this->index();
		}
		
		$categorias = new CategoriaController();
				
		$categorias->excluirCategoria($codigoCategoria);
	}
	
}


?>