<?php

require("../_bd/conexao.php");

class ContatosModel
{
	//id , titulo, contato, dataCadastro, status
	private $id;
	private $titulo;
	private $contato;
	private $dataCadastro;	
	private $status;


	public function __construct()
	{

	}


	
	public function listarContatoss()
	{
		$linhas = null;
		
		$conexao = new Conexao();
		$con = $conexao->conectar();
		
		$sql = "SELECT * FROM empresa_contatos WHERE status = 'Ativo'";
		
		$resultado = $con->query($sql);
				
		if($resultado)
		{
			$linhas = $resultado->fetchAll();
		}
		
		return $linhas;
	}
	
	public function inserirContatos()
	{
		$conexao = new Conexao();
		$con = $conexao->conectar();
		
		$stmt = $con->prepare('INSERT INTO empresa_contatos (titulo, contato, data_cadastro, status) VALUES(:titulo, :contato, :dataCadastro, :status)');
		$resultado = $stmt->execute(array(
			':titulo' => $this->getTitulo(),
			':contato' => $this->getContato(),
			':dataCadastro' => $this->getDataCadastro(),
			':status' => 'Ativo'
		  ));
		
		if (!$resultado)
		{
			var_dump( $stmt->errorInfo() );
			exit;
		}
		
		return $resultado;		
	}
	
	public function alterarContatos($codUser = null)
	{
		$conexao = new Conexao();
		$con = $conexao->conectar();
		
		
		
		if($codUser == null)
		{
			return false;
		}
		
		$stmt = $con->prepare('UPDATE empresa_contatos SET titulo = :titulo,  contato = :contato, data_cadastro = :dataCadastro, status = :status WHERE id = :codigo');
		$resultado = $stmt->execute(array(
			':titulo' => $this->getTitulo(),
			':contato' => $this->getContato(),
			':dataCadastro' => $this->getDataCadastro(),
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
	
	public function listarContatossPorId($codUser = null)
	{
		$codUser = base64_decode($codUser);
		
		if($codUser == null)
		{
			return false;
		}
		
		$linhas = null;
		
		$conexao = new Conexao();
		$con = $conexao->conectar();
		
		$stmt = $con->prepare("SELECT * FROM empresa_contatos WHERE id=:id AND status = 'Ativo'");
		$stmt->execute(['id' => $codUser]); 
		
		$linhas = $stmt->fetchAll();
		
		return $linhas;
	}
	
	public function excluirContatos($codUser = null)
	{
		$codUser = base64_decode($codUser);

		$conexao = new Conexao();
		$con = $conexao->conectar();
		
		$status = "Inativo";
		
		if($codUser == null)
		{
			return false;
		}
				
		$stmt = $con->prepare('UPDATE empresa_contatos SET status = :status WHERE id = :codigo');
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

	/**
	 * Get the value of id
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Set the value of id
	 */
	public function setId($id): self
	{
		$this->id = $id;

		return $this;
	}

	/**
	 * Get the value of titulo
	 */
	public function getTitulo()
	{
		return $this->titulo;
	}

	/**
	 * Set the value of titulo
	 */
	public function setTitulo($titulo): self
	{
		$this->titulo = $titulo;

		return $this;
	}

	/**
	 * Get the value of contato
	 */
	public function getContato()
	{
		return $this->contato;
	}

	/**
	 * Set the value of contato
	 */
	public function setContato($contato): self
	{
		$this->contato = $contato;

		return $this;
	}

	/**
	 * Get the value of dataCadastro
	 */
	public function getDataCadastro()
	{
		return $this->dataCadastro;
	}

	/**
	 * Set the value of dataCadastro
	 */
	public function setDataCadastro($dataCadastro): self
	{
		$this->dataCadastro = $dataCadastro;

		return $this;
	}

	/**
	 * Get the value of status
	 */
	public function getStatus()
	{
		return $this->status;
	}

	/**
	 * Set the value of status
	 */
	public function setStatus($status): self
	{
		$this->status = $status;

		return $this;
	}
}
?>