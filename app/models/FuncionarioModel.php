<?php

require_once("../_bd/conexao.php");


class FuncionarioModel
{
	private $id;
	private $nome;
	private $email;
	private $celular;
	private $endereco;
	private $cargo;	
	private $url_foto;
	private $status;
	private $dataCadastro;
	
	


	public function __construct()
	{

	}


	

	public function listarFuncionarios()
	{
		$linhas = null;
		
		$conexao = new Conexao();
		$con = $conexao->conectar();
		
		$sql = "SELECT * FROM funcionario WHERE status = 'Ativo'";
		
		$resultado = $con->query($sql);
				
		if($resultado)
		{
			$linhas = $resultado->fetchAll();
		}
		
		return $linhas;
	}
	
	public function inserirFuncionario()
	{
		

		$conexao = new Conexao();
		$con = $conexao->conectar();
		
		$stmt = $con->prepare('INSERT INTO funcionario (nome, email, celular,endereco, cargo, url_foto, data_cadastro, status) VALUES(:nome, :email, :celular,:endereco, :cargo, :urlFoto, :dataCadastro, :status)');
		$resultado = $stmt->execute(array(
			':nome' => $this->getNome(),
			':email' => $this->getEmail(),			
			':celular' => $this->getCelular(),			
			':endereco' => $this->getEndereco(),
			':cargo' => $this->getCargo(),
			':urlFoto' => $this->getUrlFoto(),
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
	
	public function alterarFuncionario($codUser = null)
	{
		$conexao = new Conexao();
		$con = $conexao->conectar();
		
		
		if($codUser == null)
		{
			return false;
		}
		//nome, email, celular,endereco, cargo, url_foto, data_cadastro, status
		$stmt = $con->prepare('UPDATE funcionario SET nome = :nome,  email = :email ,celular = :celular, endereco = :endereco,cargo = :cargo, url_foto = :urlFoto, data_cadastro = :dataCadastro, status = :status WHERE id = :codigo');
		$resultado = $stmt->execute(array(
			':nome' => $this->getNome(),
			':email' => $this->getEmail(),
			':celular' => $this->getCelular(),
			':endereco' => $this->getEndereco(),
			':cargo' => $this->getCargo(),
			':urlFoto' => $this->getUrlFoto(),
			':dataCadastro' => $this->getDataCadastro(),
			':status' => 'Ativo',
			':codigo' => $codUser
		  ));
		
		
		if (!$resultado)
		{
			//var_dump( $stmt->errorInfo() );
			exit;
		}
		
		return $resultado;
		
	}
	
	public function listarFuncionariosPorId($codUser = null)
	{
		$codUser = base64_decode($codUser);
		
		if($codUser == null)
		{
			return false;
		}
		
		$linhas = null;
		
		$conexao = new Conexao();
		$con = $conexao->conectar();
		
		$stmt = $con->prepare("SELECT * FROM funcionario WHERE id=:id AND status = 'Ativo'");
		$stmt->execute(['id' => $codUser]); 
		
		$linhas = $stmt->fetchAll();
		
		return $linhas;
	}
	
	public function excluirFuncionario($codUser = null)
	{
		$codUser = base64_decode($codUser);

		$conexao = new Conexao();
		$con = $conexao->conectar();
		
		$status = "Inativo";
		
		if($codUser == null)
		{
			return false;
		}
				
		$stmt = $con->prepare('UPDATE funcionario SET status = :status WHERE id = :codigo');
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
	 * Get the value of email
	 */
	public function getEmail()
	{
		return $this->email;
	}

	/**
	 * Set the value of email
	 */
	public function setEmail($email): self
	{
		$this->email = $email;

		return $this;
	}

	/**
	 * Get the value of celular
	 */
	public function getCelular()
	{
		return $this->celular;
	}

	/**
	 * Set the value of celular
	 */
	public function setCelular($celular): self
	{
		$this->celular = $celular;

		return $this;
	}

	/**
	 * Get the value of endereco
	 */
	public function getEndereco()
	{
		return $this->endereco;
	}

	/**
	 * Set the value of endereco
	 */
	public function setEndereco($endereco): self
	{
		$this->endereco = $endereco;

		return $this;
	}

	/**
	 * Get the value of cargo
	 */
	public function getCargo()
	{
		return $this->cargo;
	}

	/**
	 * Set the value of cargo
	 */
	public function setCargo($cargo): self
	{
		$this->cargo = $cargo;

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

	/**
	 * Get the value of url_foto
	 */
	public function getUrlFoto()
	{
		return $this->url_foto;
	}

	/**
	 * Set the value of url_foto
	 */
	public function setUrlFoto($url_foto): self
	{
		$this->url_foto = $url_foto;

		return $this;
	}

	/**
	 * Get the value of dataAcesso
	 */


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
}
?>