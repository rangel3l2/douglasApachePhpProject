<?php
//conferir
require  ('../models/SobreModel.php');

class SobreController 
{

	public function listar() 
	{
		$sobre = new SobreModel();
		
		$sobres = $sobre->listarSobres();

		$data = ['sobres' => $sobres];
       //var_dump($data);
	  
        if(isset ($data['status'])){
			unset($data['status']);
		}
	
			
		require '../views/sobre/lista.php';

	}
	
	public function inserir($data)
	{
		$sobre = new SobreModel();
		//id , textoSobre,  textoMissao, textoValores, dataCadastro, status
		$sobre->setTextoSobre(trim($data['textoSobre']));
		$sobre->setTextoMissao(trim($data['textoMissao']));
		$sobre->setTextoVisao(trim($data['textoVisao']));
		$sobre->setTextoValores(trim($data['textoValores']));			
		$sobre->setDataCadastro($data['dataCadastro']);		
		$sobre->inserirSobre();
		//var_dump($data);
		return $this->listar();
	}
	
	public function alterar($data)
	{
		$sobre = new SobreModel();
	
		$sobre->setTextoSobre(trim($data['textoSobre']));
		$sobre->setTextoMissao(trim($data['textoMissao']));
		$sobre->setTextoVisao(trim($data['textoVisao']));
		$sobre->setTextoValores(trim($data['textoValores']));        			
		$sobre->setDataCadastro($data['dataCadastro']);	
        $sobre->setStatus($data['status']);	
       
			
		//var_dump($data);
		$sobre->alterarSobre($data['codigo']);
	
		return $this->listar();
		
	}
	
	public function listarPorId($codUser)
	{
		$sobre = new SobreModel();
		$sobres = $sobre->listarSobresPorId($codUser);

		$data = ['sobres' => $sobres];

		require '../views/sobre/altera.php';
		
	}
	
	public function excluirSobre($codUser)
	{
		$sobre = new SobreModel();
		
		$sobre->excluirSobre($codUser);
		
		return $this->listar();
	}

}

?>