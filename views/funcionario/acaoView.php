<?php
$acao = "";
$cod = "";

$funcionario = new FuncionarioView();

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
	$funcionario->salvarDados();
	
}

if($acao == "")
{
	$funcionario->cadastro();
}

if(isset($acao) && $acao == "altera" && $cod != "")
{
	$funcionario->listarDados($cod);
}

if(isset($acao) && $acao == "exclui" && $cod != "")
{
	$funcionario->excluir($cod);
}

if(isset($acao) && $acao == "editar")
{
	$funcionario->alterarDados();
}

require  "../views/footer.php";
?>