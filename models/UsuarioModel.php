<?php

require "../_bd/Conexao.php";

class UsuarioModel
{
	private $id;
	private $usuario;
	private $senha;
	private $dataCadastro;
	private $dataAcesso;
	private $status;


	public function __construct()
	{

	}


	public function setId($id)
	{
		$this->id = $id;
	}

	public function setUsuario($user)
	{
		$this->usuario = $user;
	}

	public function setSenha($pass)
	{
		$this->senha = $pass;
	}

	public function setDataCadastro($data)
	{
		$this->dataCadastro = $data;
	}

	public function setDataAcesso($data)
	{
		$this->dataAcesso = $data;
	}

	public function setStatus($status)
	{
		$this->status = $status;
	}

	public function getId()
	{
		return $this->id;
	}

	public function getUsuario()
	{
		return $this->usuario;
	}

	public function getSenha()
	{
		return $this->senha;
	}

	public function getDataCadastro()
	{
		return $this->dataCadastro;
	}

	public function getDataAcesso()
	{
		return $this->dataAcesso;
	}

	public function getStatus()
	{
		return $this->status;
	}


	public function listarUsuarios()
	{
		$linhas = null;
		
		$conexao = new Conexao();
		$con = $conexao->conectar();
		
		$sql = "SELECT * FROM usuario WHERE status = 'Ativo'";
		
		$resultado = $con->query($sql);
				
		if($resultado)
		{
			$linhas = $resultado->fetchAll();
		}
		
		return $linhas;
	}
	
	public function inserirUsuario()
	{
		$conexao = new Conexao();
		$con = $conexao->conectar();
		
		$stmt = $con->prepare('INSERT INTO usuario (usuario, senha, ultimo_acesso, status) VALUES(:usuario, :senha, :dataAcesso, :status)');
		$resultado = $stmt->execute(array(
			':usuario' => $this->getUsuario(),
			':senha' => $this->getSenha(),
			':dataAcesso' => $this->getDataAcesso(),
			':status' => 'Ativo'
		  ));
		
		if (!$resultado)
		{
			var_dump( $stmt->errorInfo() );
			exit;
		}
		
		return $resultado;		
	}
	
	public function alterarUsuario($codUser = null)
	{
		$conexao = new Conexao();
		$con = $conexao->conectar();
		
		
		
		if($codUser == null)
		{
			return false;
		}
		
		$stmt = $con->prepare('UPDATE usuario SET usuario = :usuario,  senha = :senha, ultimo_acesso = :dataAcesso, status = :status WHERE id = :codigo');
		$resultado = $stmt->execute(array(
			':usuario' => $this->getUsuario(),
			':senha' => $this->getSenha(),
			':dataAcesso' => $this->getDataAcesso(),
			':status' => $this->getStatus(),
			':codigo' => $codUser
			
		  ));
		
		
		if (!$resultado)
		{
			var_dump( $stmt->errorInfo() );
			exit;
		}
		
		return $resultado;
		
	}
	
	public function listarUsuariosPorId($codUser = null)
	{
		$codUser = base64_decode($codUser);
		
		if($codUser == null)
		{
			return false;
		}
		
		$linhas = null;
		
		$conexao = new Conexao();
		$con = $conexao->conectar();
		
		$stmt = $con->prepare("SELECT * FROM usuario WHERE id=:id AND status = 'Ativo'");
		$stmt->execute(['id' => $codUser]); 
		
		$linhas = $stmt->fetchAll();
		
		return $linhas;
	}
	
	public function excluirUsuario($codUser = null)
	{
		$codUser = base64_decode($codUser);

		$conexao = new Conexao();
		$con = $conexao->conectar();
		
		$status = "Inativo";
		
		if($codUser == null)
		{
			return false;
		}
				
		$stmt = $con->prepare('UPDATE usuario SET status = :status WHERE id = :codigo');
		$resultado = $stmt->execute(array(
			':status' => $status,
			':codigo' => $codUser
		  ));
		
		
		if (!$resultado)
		{			
			var_dump( $stmt->errorInfo() );
			exit;
		}
		
		return $resultado;		
	}
}
?>