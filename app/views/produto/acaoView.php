<?php
$acao = "";
$cod = "";

$produto = new ProdutoView();

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
	$produto->salvarDados();
	
}

if($acao == "")
{
	$produto->cadastro();
}

if(isset($acao) && $acao == "altera" && $cod != "")
{
	$produto->listarDados($cod);
}

if(isset($acao) && $acao == "exclui" && $cod != "")
{
	$produto->excluir($cod);
}

if(isset($acao) && $acao == "editar")
{
	$produto->alterarDados();
}

require  "../views/footer.php";
?>