<?php

require_once "../_bd/Conexao.php";

class SobreModel
{
    //id , textoSobre,  textoMissao, textoVisao, textoValores, dataCadastro, status
	private $id;
	private $textoSobre;
	private $textoMissao;
    private $textoVisao;
    private $textoValores;
	private $dataCadastro;	
	private $status;


	public function __construct()
	{

	}


	public function listarSobres()
	{
		$linhas = null;
		
		$conexao = new Conexao();
		$con = $conexao->conectar();
		
		$sql = "SELECT * FROM empresa_sobre WHERE status = 'Ativo'";
		
		$resultado = $con->query($sql);
				
		if($resultado)
		{
			$linhas = $resultado->fetchAll();
		}
		
		return $linhas;
	}
	
	public function inserirSobre()
	{
		
		$conexao = new Conexao();
		$con = $conexao->conectar();
		 //id , textoSobre,  textoMissao, textoValores, dataCadastro, status
		$stmt = $con->prepare('INSERT INTO empresa_sobre (texto_sobre,texto_missao,texto_visao,texto_valores, data_cadastro, status) VALUES(:textoSobre,:textoMissao,:textoVisao, :textoValores, :dataCadastro, :status)');
		$resultado = $stmt->execute(array(
			':textoSobre' => $this->getTextoSobre(),			
			':textoMissao' => $this->getTextoMissao(),
            ':textoVisao' => $this->getTextoVisao(),
            ':textoValores' => $this->getTextoValores(),
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
	
	public function alterarSobre($codUser = null)
	{
		$conexao = new Conexao();
		$con = $conexao->conectar();
		
		
		
		if($codUser == null)
		{
			return false;
		}
		//id , textoSobre,  textoMissao, textoValores, dataCadastro, status
		$stmt = $con->prepare('UPDATE empresa_sobre SET texto_sobre = :textoSobre,texto_missao = :textoMissao,  texto_visao = :textoVisao, texto_valores = :textoValores, data_cadastro = :dataCadastro, status = :status WHERE id = :codigo');
		$resultado = $stmt->execute(array(
			':textoSobre' => $this->getTextoSobre(),			
			':textoMissao' => $this->getTextoMissao(),
            ':textoVisao' => $this->getTextoVisao(),
            ':textoValores' => $this->getTextoValores(),
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
	
	public function listarSobresPorId($codUser = null)
	{
		$codUser = base64_decode($codUser);
		
		if($codUser == null)
		{
			return false;
		}
		
		$linhas = null;
		
		$conexao = new Conexao();
		$con = $conexao->conectar();
		
		$stmt = $con->prepare("SELECT * FROM empresa_sobre WHERE id=:id AND status = 'Ativo'");
		$stmt->execute(['id' => $codUser]); 
		
		$linhas = $stmt->fetchAll();
		
		return $linhas;
	}
	
	public function excluirSobre($codUser = null)
	{
		$codUser = base64_decode($codUser);

		$conexao = new Conexao();
		$con = $conexao->conectar();
		
		$status = "Inativo";
		
		if($codUser == null)
		{
			return false;
		}
				
		$stmt = $con->prepare('UPDATE empresa_sobre SET status = :status WHERE id = :codigo');
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
	 * Get the value of textoSobre
	 */
	public function getTextoSobre()
	{
		return $this->textoSobre;
	}

	/**
	 * Set the value of textoSobre
	 */
	public function setTextoSobre($textoSobre): self
	{
		$this->textoSobre = $textoSobre;

		return $this;
	}

	/**
	 * Get the value of textoMissao
	 */
	public function getTextoMissao()
	{
		return $this->textoMissao;
	}

	/**
	 * Set the value of textoMissao
	 */
	public function setTextoMissao($textoMissao): self
	{
		$this->textoMissao = $textoMissao;

		return $this;
	}

    /**
     * Get the value of textoVisao
     */
    public function getTextoVisao()
    {
        return $this->textoVisao;
    }

    /**
     * Set the value of textoVisao
     */
    public function setTextoVisao($textoVisao): self
    {
        $this->textoVisao = $textoVisao;

        return $this;
    }

    /**
     * Get the value of textoValores
     */
    public function getTextoValores()
    {
        return $this->textoValores;
    }

    /**
     * Set the value of textoValores
     */
    public function setTextoValores($textoValores): self
    {
        $this->textoValores = $textoValores;

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