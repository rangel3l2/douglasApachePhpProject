<?php 

class Conexao
{
    private $tipoBanco  = "";
    private $servidor   = "";
    private $porta      = "";
    private $usuario    = "";
    private $senha      = "";
    private $banco      = "";
    private $conexao    = null;
    
    public function __construct()
    {		
		$this->setTipoBanco("mysql");
		$this->setServidor("localhost");
		$this->setPorta("3306");
		$this->setUsuario("root");
		$this->setSenha("root");
		$this->setBanco("auladouglas");
    }
     
     
    /*Método que destroi a conexão com banco de dados e remove da memória todas as variáveis setadas*/
    public function __destruct() 
    {
        $this->desconectar();
        
        foreach ($this as $key => $value) 
        {
            unset($this->$key);
        }
    }
     
    
    public function setTipoBanco($tipo)
    {
        $this->tipoBanco = $tipo;
    }

    public function setServidor($server)
    {
        $this->servidor = $server;
    }

    public function setPorta($port)
    {
        $this->porta = $port;
    }

    public function setUsuario($user)
    {
        $this->usuario = $user;
    }

    public function setSenha($pass)
    {
		$this->senha = $pass;
    }

    public function setBanco($bd)
    {
        $this->banco = $bd;
    }
	
	public function setConexao($con)
	{
		$this->conexao = $con;
	}

    public function getTipoBanco()
    {
        return $this->tipoBanco;
    }

    public function getServidor()
    {
        return $this->servidor;
    }

    public function getPorta()
    {
        return $this->porta;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function getBanco()
    {
        return $this->banco;
    }

    public function getConexao()
    {  
        return $this->conexao;
    }

     
    public function conectar()
    {
		try
        {
            $this->conexao = new PDO($this->getTipoBanco().":host=".$this->getServidor().";port=".$this->getPorta().";dbname=".$this->getBanco(), $this->getUsuario(), $this->getSenha());
		}
        catch (PDOException $i)
        {
            //se houver exceção, exibe
            die("Erro: <code>" . $i->getMessage() . "</code>");
        }
        
		return $this->conexao;
    }
     
    public function desconectar()
    {
        $this->conexao = null;
    }
}
?>