<?php
$acao = "";
$cod = "";

$usuario = new UsuarioView();

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
	
	$usuario->salvarDados();
	
	
}

if($acao == "")
{
	$usuario->cadastro();
}

if(isset($acao) && $acao == "altera" && $cod != "")
{
	$usuario->listarDados($cod);
}

if(isset($acao) && $acao == "exclui" && $cod != "")
{
	
	$usuario->excluir($cod);

}

if(isset($acao) && $acao == "editar")
{
	$usuario->alterarDados();
}

require_once "../views/footer.php";
?>