
<?php
require "../controllers/CidadeController.php";
require  "cidade/acaoVIew.php";


class CidadeView
{
	public function __construct()
	{
		$this->index();
		
	}	
	
	public function index()
	{
		$cidades = new CidadeController();
		
		$cidades->listar();
		
	}
	
	public function cadastro()
	{
		require  '../views/cidade/cadastro.php';
	}
	
	public function salvarDados()
	{
		$cidades = new CidadeController();
		//id , nome, status
		$data['nome']    	= $_POST["txtNome"];

		
		$cidades->inserir($data);
		
		
	}
	
	public function listarDados($codigoCidade = null)
	{
		if($codigoCidade == null)
		{
			$this->index();
		}
		
		$cidades = new CidadeController();
		
		$cidades->listarPorId($codigoCidade);
	}
	
	public function alterarDados()
	{
		$cidades = new CidadeController();
		
		$data['nome']    	= $_POST["txtNome"];
	
        $data['status']     = $_POST["txtStatus"];    
		$data['codigo']		= $_POST["txtID"];
		
		
		$cidades->alterar($data);
		
	}
	
	public function excluir($codigoCidade = null)
	{
		if($codigoCidade == null)
		{
			$this->index();
		}
		
		$cidades = new CidadeController();
				
		$cidades->excluirCidade($codigoCidade);
	}
	
}


?>