
<?php
require "../controllers/SobreController.php";
require  "sobre/acaoView.php";


class SobreView
{
	public function __construct()
	{
		$this->index();
		
	}	
	
	public function index()
	{
		$sobres = new SobreController();
		
		$sobres->listar();
		
	}
	
	public function cadastro()
	{
		require  '../views/sobre/cadastro.php';
	}
	
	public function salvarDados()
	{
		$sobres = new SobreController();
		//id , textoSobre,  textoMissao, textoValores, dataCadastro, status
		$data['textoSobre']    	= $_POST["textoSobre"];
		$data['textoMissao'] 		= $_POST["textoMissao"];
		$data['textoVisao'] 	= $_POST["textoVisao"];
		$data['textoValores'] 	= $_POST["textoValores"];		
		$data['dataCadastro']	= $_POST["txtDataCadastro"];
		
		$sobres->inserir($data);
		
		
	}
	
	public function listarDados($codigoSobre = null)
	{
		if($codigoSobre == null)
		{
			$this->index();
		}
		
		$sobres = new SobreController();
		
		$sobres->listarPorId($codigoSobre);
	}
	
	public function alterarDados()
	{
		$sobres = new SobreController();
		
		$data['textoSobre']    	= $_POST["textoSobre"];
		$data['textoMissao'] 		= $_POST["textoMissao"];
		$data['textoVisao'] 	= $_POST["textoVisao"];
		$data['textoValores'] 	= $_POST["textoValores"];		
		$data['dataCadastro']	= $_POST["txtDataCadastro"];  
        $data['status'] = $_POST["txtStatus"];    
		$data['codigo']		= $_POST["txtID"];
		
		
		$sobres->alterar($data);
		
	}
	
	public function excluir($codigoSobre = null)
	{
		if($codigoSobre == null)
		{
			$this->index();
		}
		
		$sobres = new SobreController();
				
		$sobres->excluirSobre($codigoSobre);
	}
	
}


?>