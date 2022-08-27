<?php

require "../_bd/Conexao.php";

class EstadoModel
{
	private $id;
	private $nome;
	private $sigla;	
	private $status;
	//id, nome , sigla, status

	public function __construct()
	{

	}



	public function listarEstados()
	{
		$linhas = null;
		
		$conexao = new Conexao();
		$con = $conexao->conectar();
		
		$sql = "SELECT * FROM estado WHERE status = 'Ativo'";
		
		$resultado = $con->query($sql);
				
		if($resultado)
		{
			$linhas = $resultado->fetchAll();
		}
		
		return $linhas;
	}
	
	public function inserirEstado()
	{
		$conexao = new Conexao();
		$con = $conexao->conectar();
		
		$stmt = $con->prepare('INSERT INTO estado (nome, sigla, status) VALUES(:nome, :sigla, :status)');
		$resultado = $stmt->execute(array(
			':nome' => $this->getNome(),
			':sigla' => $this->getSigla(),		
			':status' => 'Ativo'
		  ));
		
		if (!$resultado)
		{
			var_dump( $stmt->errorInfo() );
			exit;
		}
		
		return $resultado;		
	}
	
	public function alterarEstado($codUser = null)
	{
		$conexao = new Conexao();
		$con = $conexao->conectar();
		
		
		
		if($codUser == null)
		{
			return false;
		}
		
		$stmt = $con->prepare('UPDATE estado SET nome = :nome,  sigla = :sigla, status = :status WHERE id = :codigo');
		$resultado = $stmt->execute(array(
			':nome' => $this->getNome(),
			':sigla' => $this->getSigla(),			
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
	
	public function listarEstadosPorId($codUser = null)
	{
		$codUser = base64_decode($codUser);
		
		if($codUser == null)
		{
			return false;
		}
		
		$linhas = null;
		
		$conexao = new Conexao();
		$con = $conexao->conectar();
		
		$stmt = $con->prepare("SELECT * FROM estado WHERE id=:id AND status = 'Ativo'");
		$stmt->execute(['id' => $codUser]); 
		
		$linhas = $stmt->fetchAll();
		
		return $linhas;
	}
	
	public function excluirEstado($codUser = null)
	{
		$codUser = base64_decode($codUser);

		$conexao = new Conexao();
		$con = $conexao->conectar();
		
		$status = "Inativo";
		
		if($codUser == null)
		{
			return false;
		}
				
		$stmt = $con->prepare('UPDATE estado SET status = :status WHERE id = :codigo');
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
	 * Get the value of nome
	 */
	public function getNome()
	{
		return $this->nome;
	}

	/**
	 * Set the value of nome
	 */
	public function setNome($nome): self
	{
		$this->nome = $nome;

		return $this;
	}

	/**
	 * Get the value of sigla
	 */
	public function getSigla()
	{
		return $this->sigla;
	}

	/**
	 * Set the value of sigla
	 */
	public function setSigla($sigla): self
	{
		$this->sigla = $sigla;

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