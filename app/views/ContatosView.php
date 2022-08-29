
<?php
require "../controllers/ContatosController.php";
require  "contatos/acaoView.php";


class ContatosView
{
	public function __construct()
	{
		$this->index();
		
	}	
	
	public function index()
	{
		$contatos = new ContatosController();
		
		$contatos->listar();
		
	}
	
	public function cadastro()
	{
		require  '../views/contatos/cadastro.php';
	}
	
	public function salvarDados()
	{
		$contatos = new ContatosController();
		//id , titulo, contato, dataCadastro, status
		$data['titulo']    	= $_POST["txtTitulo"];
		$data['contato'] 		= $_POST["txtContato"];			
		$data['dataCadastro']	= $_POST["txtDataCadastro"];
		
		$contatos->inserir($data);
		
		
	}
	
	public function listarDados($codigoContatos = null)
	{
		if($codigoContatos == null)
		{
			$this->index();
		}
		
		$contatos= new ContatosController();
		
		$contatos->listarPorId($codigoContatos);
	}
	
	public function alterarDados()
	{
		$contatos = new ContatosController();
		
		$data['titulo ']    	= $_POST["txtTitulo"];
		$data['contato'] 		= $_POST["txtContato"];			
		$data['dataCadastro']	= $_POST["txtDataCadastro"];
        $data['status']         = $_POST["txtStatus"];    
		$data['codigo']	     	= $_POST["txtID"];
		
		
		$contatos->alterar($data);
		
	}
	
	public function excluir($codigoContatos = null)
	{
		if($codigoContatos == null)
		{
			$this->index();
		}
		
		$contatos = new SobreController();
				
		$contatos->excluirSobre($codigoContatos);
	}
	
}


?>