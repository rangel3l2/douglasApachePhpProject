<?php

require  '../models/FuncionarioModel.php';

class FuncionarioController 
{
//pronto
	public function listar() 
	{
		$funcionario = new FuncionarioModel();
		
		$funcionarios = $funcionario->listarFuncionarios();

		$data = ['funcionarios' => $funcionarios];
       //var_dump($data);
	  
        if(isset ($data['status'])){
			unset($data['status']);
		}
	
			
		require '../views/funcionario/lista.php';

	}
	
	public function inserir($data)
	{
		$funcionario = new FuncionarioModel();
		//nome, email, celular,endereco, cargo, url_foto, data_acesso, status
		$funcionario->setNome(trim($data['nome']));
		$funcionario->setEmail(trim($data['email']));
		$funcionario->setCelular(trim($data['celular']));
		$funcionario->setEndereco(trim($data['endereco']));
		$funcionario->setCargo(trim($data['cargo']));
		$funcionario->setUrlFoto(trim($data['urlFoto']));		
		$funcionario->setDataCadastro($data['dataCadastro']);		
		$funcionario->inserirFuncionario();
		//var_dump($data);
		return $this->listar();
	}
	
	public function alterar($data)
	{
		$funcionario = new FuncionarioModel();
	
		$funcionario->setNome(trim($data['nome']));		
		$funcionario->setEmail(trim($data['email']));		
		$funcionario->setCelular(trim($data['celular']));		
		$funcionario->setEndereco(trim($data['endereco']));	
		$funcionario->setCargo(trim($data['cargo']));		
		$funcionario->setUrlFoto(trim($data['urlFoto']));		
		$funcionario->setDataCadastro($data['dataCadastro']);
			
		var_dump($data);
		$funcionario->alterarFuncionario($data['codigo']);
	
		return $this->listar();
		
	}
	
	public function listarPorId($codUser)
	{
		$funcionario = new FuncionarioModel();
		$funcionarios = $funcionario->listarFuncionariosPorId($codUser);

		$data = ['funcionarios' => $funcionarios];

		require '../views/funcionario/altera.php';
		
	}
	
	public function excluirFuncionario($codUser)
	{
		$funcionario = new FuncionarioModel();
		
		$funcionario->excluirFuncionario($codUser);
		
		return $this->listar();
	}

}

?>