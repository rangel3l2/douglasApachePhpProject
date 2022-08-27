
<?php
require "../controllers/FuncionarioController.php";
require  "funcionario/acaoView.php";


class FuncionarioView
{
	public function __construct()
	{
		$this->index();
		
	}	
	
	public function index()
	{
		$funcionarios = new FuncionarioController();
		
		$funcionarios->listar();
		
	}
	
	public function cadastro()
	{
		require  '../views/funcionario/cadastro.php';
	}
	
	public function salvarDados()
	{
		$funcionarios = new FuncionarioController();
		//nome, email, celular,endereco, cargo, url_foto, data_acesso, status
		$data['nome']    	= $_POST["txtNome"];
		$data['email'] 		= $_POST["txtEmail"];
		$data['celular'] 	= $_POST["txtCelular"];
		$data['endereco'] 	= $_POST["txtEndereco"];
		$data['cargo'] 		= $_POST["txtCargo"];
		$data['urlFoto'] 	= $_POST["txtUrlFoto"];		
		$data['dataCadastro']	= $_POST["txtDataCadastro"];
		
		$funcionarios->inserir($data);
		
		
	}
	
	public function listarDados($codigoFuncionario = null)
	{
		if($codigoFuncionario == null)
		{
			$this->index();
		}
		
		$funcionarios = new FuncionarioController();
		
		$funcionarios->listarPorId($codigoFuncionario);
	}
	
	public function alterarDados()
	{
		$funcionarios = new FuncionarioController();
		
		$data['nome'] 	= $_POST["txtNome"];
		$data['email'] 		= $_POST["txtEmail"];
		$data['celular'] 		= $_POST["txtCelular"];
		$data['cargo'] 		= $_POST["txtCargo"];
		$data['endereco'] 		= $_POST["txtEndereco"];
		$data['urlFoto'] 		= $_POST["txtUrlFoto"];	
		$data['dataCadastro']	= $_POST["txtDataCadastro"];
		$data['codigo']		= $_POST["txtID"];
		
		
		$funcionarios->alterar($data);
		
	}
	
	public function excluir($codigoFuncionario = null)
	{
		if($codigoFuncionario == null)
		{
			$this->index();
		}
		
		$funcionarios = new FuncionarioController();
				
		$funcionarios->excluirFuncionario($codigoFuncionario);
	}
	
}


?>