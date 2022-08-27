<?php
$acao = "";
$cod = "";

$estado = new EstadoView();

if(isset($_GET["acao"]))
{
	$acao = $_GET["acao"];	
}

if(isset($_GET["cod"]))
{
	$cod = $_GET["cod"];	
}

if(isset($acao) && $acao == "cadastro")
{
	$estado->salvarDados();
	
}

if($acao == "")
{
	$estado->cadastro();
}

if(isset($acao) && $acao == "altera" && $cod != "")
{
	$estado->listarDados($cod);
}

if(isset($acao) && $acao == "exclui" && $cod != "")
{
	$estado->excluir($cod);
}

if(isset($acao) && $acao == "editar")
{
	$estado->alterarDados();
}

require  "../views/footer.php";
?>