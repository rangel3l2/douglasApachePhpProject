<?php
$acao = "";
$cod = "";

$cidade = new CidadeView();

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
	$cidade->salvarDados();
	
}

if($acao == "")
{
	$cidade->cadastro();
}

if(isset($acao) && $acao == "altera" && $cod != "")
{
	$cidade->listarDados($cod);
}

if(isset($acao) && $acao == "exclui" && $cod != "")
{
	$cidade->excluir($cod);
}

if(isset($acao) && $acao == "editar")
{
	$cidade->alterarDados();
}

require  "../views/footer.php";
?>