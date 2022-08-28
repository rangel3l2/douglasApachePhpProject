<?php
$acao = "";
$cod = "";

$contatos = new ContatosView();

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
	$contatos->salvarDados();
	
}

if($acao == "")
{
	$contatos->cadastro();
}

if(isset($acao) && $acao == "altera" && $cod != "")
{
	$contatos->listarDados($cod);
}

if(isset($acao) && $acao == "exclui" && $cod != "")
{
	$contatos->excluir($cod);
}

if(isset($acao) && $acao == "editar")
{
	$contatos->alterarDados();
}

require  "../views/footer.php";
?>