<?php
//conferir
require  '../models/EstadoModel.php';

class EstadoController 
{

	public function listar() 
	{
		$estado = new EstadoModel();
		
		$estados = $estado->listarEstados();

		$data = ['estados' => $estados];
       //var_dump($data);
	  
        if(isset ($data['status'])){
			unset($data['status']);
		}
	
			
		require '../views/estado/lista.php';

	}
	
	public function inserir($data)
	{
		$estado = new EstadoModel();
		//id, nome , sigla, status
		$estado->setNome(trim($data['nome']));
		$estado->setSigla(trim($data['sigla']));			
		$estado->inserirEstado();
		//var_dump($data);
		return $this->listar();
	}
	
	public function alterar($data)
	{
		$estado = new EstadoModel();
	
		$estado->setNome(trim($data['nome']));
		$estado->setSigla(trim($data['sigla']));	
        $estado->setStatus($data['status']);	
       
			
		//var_dump($data);
		$estado->alterarEstado($data['codigo']);
	
		return $this->listar();
		
	}
	
	public function listarPorId($codUser)
	{
		$estado = new EstadoModel();
		$estados = $estado->listarEstadosPorId($codUser);

		$data = ['estados' => $estados];

		require '../views/estado/altera.php';
		
	}
	
	public function excluirEstado($codUser)
	{
		$estado = new EstadoModel();
		
		$estado->excluirEstado($codUser);
		
		return $this->listar();
	}

}

?>