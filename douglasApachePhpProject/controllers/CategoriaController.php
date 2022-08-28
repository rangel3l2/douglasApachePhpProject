<?php
//pronto
require  '../models/CategoriaModel.php';

class CategoriaController 
{

	public function listar() 
	{
		$categoria = new CategoriaModel();
		
		$categorias = $categoria->listarCategorias();
         
		$data = ['categorias' => $categorias];
       //var_dump($data);
	   if(isset ($data['status'])){
        unset($data['status']);
    }
        
	
			
		require '../views/categoria/lista.php';
       

	}
	
	public function inserir($data)
	{
       
		$categoria = new CategoriaModel();
		//nome,descricao, datacadastro, status, codigo
		$categoria->setNome(trim($data['nome']));		
		$categoria->setDescricao(trim($data['descricao']));       
		$categoria->setDataCadastro(trim($data['dataCadastro']));			
		$categoria->inserirCategoria();
		// var_dump("dados inserido",$categoria);
		return $this->listar();
	}
	
	public function alterar($data)
	{
		$categoria = new CategoriaModel();
	
		$categoria->setNome(trim($data['nome']));		
		$categoria->setDescricao(trim($data['descricao']));      
		$categoria->setDataCadastro(trim($data['dataCadastro']));			
		
		$categoria->alterarCategoria($data['codigo']);
	
		return $this->listar();
		
	}
	
	public function listarPorId($codUser)
	{
		$categoria = new CategoriaModel();
		$categorias = $categoria->listarCategoriasPorId($codUser);

		$data = ['categorias' => $categorias];

		require '../views/categoria/altera.php';
		
	}
	
	public function excluirCategoria($codUser)
	{
		$categoria = new CategoriaModel();
		
		$categoria->excluirCategoria($codUser);
		
		return $this->listar();
	}

}

?>