<?php

require '../models/UsuarioModel.php';

class UsuarioController 
{

	public function listar() 
	{
		$usuario = new UsuarioModel();
		$usuarios = $usuario->listarUsuarios();

		$data = ['usuarios' => $usuarios];
        if(isset ($data['status'])){
			unset($data['status']);
		}
		require '../views/usuario/lista.php';
	}
	
	public function inserir($data)
	{
		$usuario = new UsuarioModel();
		
		$usuario->setUsuario(trim($data['usuario']));
		$usuario->setSenha(md5($data['senha']));
		$usuario->setDataAcesso($data['dataAcesso']);
		
		$usuario->inserirUsuario();
		
		return $this->listar();
	}
	
	public function alterar($data)
	{
		$usuario = new UsuarioModel();
		
		$usuario->setUsuario(trim($data['usuario']));
		$usuario->setSenha(md5($data['senha']));
		$usuario->setDataAcesso($data['dataAcesso']);
		$usuario->setStatus($data['status']);
		
		$usuario->alterarUsuario($data['codigo']);
		
		return $this->listar();
		
	}
	
	public function listarPorId($codUser)
	{
		$usuario = new UsuarioModel();
		$usuarios = $usuario->listarUsuariosPorId($codUser);

		$data = ['usuarios' => $usuarios];

		require '../views/usuario/altera.php';
		
	}
	
	public function excluirUsuario($codUser)
	{
		$usuario = new UsuarioModel();
		
		$usuario->excluirUsuario($codUser);
		
		return $this->listar();
	}

}

?>