<?php
//conferir
require  '../models/ContatosModel.php';

class ContatosController 
{

	public function listar() 
	{
		$contato = new ContatosModel();

		
		$contatos = $contato->listarContatoss();

		$data = ['contatos' => $contatos];
       //var_dump($data);
	  
        if(isset ($data['status'])){
			unset($data['status']);
		}
	
			
		require '../views/contatos/lista.php';

	}
	
	public function inserir($data)
	{
		$contatos = new ContatosModel();
		//id , titulo, contato, dataCadastro, status
		$contatos->setTitulo(trim($data['titulo']));
		$contatos->setContato(trim($data['contato']));				
		$contatos->setDataCadastro($data['dataCadastro']);		
		$contatos->inserirContatos();
		//var_dump($data);
		return $this->listar();
	}
	
	public function alterar($data)
	{
		$contatos = new ContatosModel();
	
		$contatos->setTitulo(trim($data['titulo']));
		$contatos->setContato(trim($data['contato']));				
		$contatos->setDataCadastro($data['dataCadastro']); 
        $contatos->setStatus($data['status']);

		//var_dump($data);
		$contatos->alterarContatos($data['codigo']);
	
		return $this->listar();
		
	}
	
	public function listarPorId($codUser)
	{
		$contato = new ContatosModel();
		$contatos = $contato->listarContatossPorId($codUser);

		$data = ['contatos' => $contatos];

		require '../views/contatos/altera.php';
		
	}
	
	public function excluirContato($codUser)
	{
		$contatos = new ContatosModel();
		
		$contatos->excluirContatos($codUser);
		
		return $this->listar();
	}

}

?>