
<?php
require "../controllers/UsuarioController.php";
require "usuario/acaoView.php";


class UsuarioView
{
	public function __construct()
	{
		$this->index();
		
	}	
	
	public function index()
	{
		$usuarios = new UsuarioController();
		
		$usuarios->listar();
	
	}
	
	public function cadastro()
	{
		require '../views/usuario/cadastro.php';
	}
	
	public function salvarDados()
	{
		$usuarios = new UsuarioController();
		
		$data['usuario'] 	= $_POST["txtUsuario"];
		$data['senha'] 		= $_POST["txtSenha"];
		$data['dataAcesso']	= $_POST["txtDataAcesso"];
		
		$usuarios->inserir($data);
		
	}
	
	public function listarDados($codigoUsuario = null)
	{
		if($codigoUsuario == null)
		{
			$this->index();
		}
		
		$usuarios = new UsuarioController();
		
		$usuarios->listarPorId($codigoUsuario);
	}
	
	public function alterarDados()
	{
		$usuarios = new UsuarioController();
		
		$data['usuario'] 	= $_POST["txtUsuario"];
		$data['senha'] 		= $_POST["txtSenha"];
		$data['dataAcesso']	= $_POST["txtDataAcesso"];
		$data['codigo']		= $_POST["txtID"];
		
		//var_dump($data);
		$usuarios->alterar($data);
		
	}
	
	public function excluir($codigoUsuario = null)
	{
		if($codigoUsuario == null)
		{
			$this->index();
		}
		
		$usuarios = new UsuarioController();
				
		$usuarios->excluirUsuario($codigoUsuario);
	}
	
}


?>