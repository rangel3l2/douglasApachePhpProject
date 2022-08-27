<?php

require_once "../_bd/Conexao.php";

class ProdutoModel
{
    //id , nome marca, descricao, data_cadastro, status
	private $id;
	private $nome;
	private $marca;
	private $modelo;
	private $descricao;
	private $dataCadastro;
	private $status;


	public function __construct()
	{

	}


	public function listarProdutos()
	{
		$linhas = null;
		
		$conexao = new Conexao();
		$con = $conexao->conectar();
		
		$sql = "SELECT * FROM produto WHERE status = 'Ativo'";
		
		$resultado = $con->query($sql);
				
		if($resultado)
		{
			$linhas = $resultado->fetchAll();
		}
		
		return $linhas;
	}
	
	public function inserirProduto()
	{
		
		$conexao = new Conexao();
		$con = $conexao->conectar();
		//id , nome marca, descricao, data_cadastro, status
		$stmt = $con->prepare('INSERT INTO produto (nome, marca,descricao, modelo, data_cadastro, status) VALUES(:nome, :marca,:descricao,:modelo, :dataCadastro, :status)');
		$resultado = $stmt->execute(array(
			':nome' => $this->getNome(),
			':marca' => $this->getMarca(),
			':descricao' => $this->getDescricao(),
			':modelo'=> $this->getModelo(),
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
	
	public function alterarProduto($codUser = null)
	{
		$conexao = new Conexao();
		$con = $conexao->conectar();
		
		
		
		if($codUser == null)
		{
			return false;
		}
		
		$stmt = $con->prepare('UPDATE produto SET nome = :nome,  marca = :marca, descricao = :descricao, modelo = :modelo, data_cadastro = :dataCadastro, status = :status WHERE id = :codigo');
		$resultado = $stmt->execute(array(
			':nome' => $this->getNome(),
			':marca' => $this->getMarca(),
			':descricao' => $this->getDescricao(),
			':modelo'=> $this->getModelo(),
			':dataCadastro' => $this->getDataCadastro(),
			':status' => 'Ativo',
			':codigo' => $codUser
		  ));
		
		
		if (!$resultado)
		{
			var_dump( $stmt->errorInfo() );
			exit;
		}
		
		return $resultado;
		
	}
	
	public function listarProdutosPorId($codUser = null)
	{
		$codUser = base64_decode($codUser);
		
		if($codUser == null)
		{
			return false;
		}
		
		$linhas = null;
		
		$conexao = new Conexao();
		$con = $conexao->conectar();
		
		$stmt = $con->prepare("SELECT * FROM produto WHERE id=:id AND status = 'Ativo'");
		$stmt->execute(['id' => $codUser]); 
		
		$linhas = $stmt->fetchAll();
		
		return $linhas;
	}
	
	public function excluirProduto($codUser = null)
	{
		$codUser = base64_decode($codUser);

		$conexao = new Conexao();
		$con = $conexao->conectar();
		
		$status = "Inativo";
		
		if($codUser == null)
		{
			return false;
		}
				
		$stmt = $con->prepare('UPDATE produto SET status = :status WHERE id = :codigo');
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
	 * Get the value of marca
	 */
	public function getMarca()
	{
		return $this->marca;
	}

	/**
	 * Set the value of marca
	 */
	public function setMarca($marca): self
	{
		$this->marca = $marca;

		return $this;
	}

	/**
	 * Get the value of descricao
	 */
	public function getDescricao()
	{
		return $this->descricao;
	}

	/**
	 * Set the value of descricao
	 */
	public function setDescricao($descricao): self
	{
		$this->descricao = $descricao;

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

	/**
	 * Get the value of modelo
	 */
	public function getModelo()
	{
		return $this->modelo;
	}

	/**
	 * Set the value of modelo
	 */
	public function setModelo($modelo): self
	{
		$this->modelo = $modelo;

		return $this;
	}
}
?>