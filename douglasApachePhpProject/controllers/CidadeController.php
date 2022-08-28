<?php
//conferir
require  '../models/CidadeModel.php';

class CidadeController 
{

	public function listar() 
	{
		$cidade = new CidadeModel();
		
		$cidades = $cidade->listarCidades();

		$data = ['cidades' => $cidades];
       //var_dump($data);
	  
        if(isset ($data['status'])){
			unset($data['status']);
		}
	
			
		require '../views/cidade/lista.php';

	}
	
	public function inserir($data)
	{
		$cidade = new CidadeModel();
		//id, nome status
		$cidade->setNome(trim($data['nome']));
		
		$cidade->inserirCidade();
		//var_dump($data);
		return $this->listar();
	}
	
	public function alterar($data)
	{
		$cidade = new CidadeModel();
	
		$cidade->setNome(trim($data['nome']));		
        $cidade->setStatus($data['status']);	
       
			
		//var_dump($data);
		$cidade->alterarCidade($data['codigo']);
	
		return $this->listar();
		
	}
	
	public function listarPorId($codUser)
	{
		$cidade = new CidadeModel();
		$cidades = $cidade->listarCidadesPorId($codUser);

		$data = ['cidades' => $cidades];

		require '../views/cidade/altera.php';
		
	}
	
	public function excluirCidade($codUser)
	{
		$cidade = new CidadeModel();
		
		$cidade->excluirCidade($codUser);
		
		return $this->listar();
	}

}

?>