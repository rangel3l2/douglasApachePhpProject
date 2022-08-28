
<?php
require "../controllers/EstadoController.php";
require  "estado/acaoView.php";


class EstadoView
{
	public function __construct()
	{
		$this->index();
		
	}	
	
	public function index()
	{
		$estados = new EstadoController();
		
		$estados->listar();
		
	}
	
	public function cadastro()
	{
		require  '../views/estado/cadastro.php';
	}
	
	public function salvarDados()
	{
		$estados = new EstadoController();
			//id, nome , sigla, status
		$data['nome']    	= $_POST["txtNome"];
		$data['sigla'] 		= $_POST["txtSigla"];
	
		$estados->inserir($data);
		
		
	}
	
	public function listarDados($codigoEstado = null)
	{
		if($codigoEstado == null)
		{
			$this->index();
		}
		
		$estados = new EstadoController();
		
		$estados->listarPorId($codigoEstado);
	}
	
	public function alterarDados()
	{
		$estados = new EstadoController();
		
		$data['nome']    	= $_POST["txtNome"];
		$data['sigla'] 		= $_POST["txtSigla"]; 
        $data['status'] = $_POST["txtStatus"];    
		$data['codigo']		= $_POST["txtID"];
		
		
		$estados->alterar($data);
		
	}
	
	public function excluir($codigoEstado = null)
	{
		if($codigoEstado == null)
		{
			$this->index();
		}
		
		$estados = new EstadoController();
				
		$estados->excluirEstado($codigoEstado);
	}
	
}


?>