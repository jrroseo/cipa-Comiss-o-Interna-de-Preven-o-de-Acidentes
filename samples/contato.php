﻿<?php include "topo.php"; ?>  
<!DOCTYPE html>
<!--
Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.md or http://ckeditor.com/license
-->
<html>

<head>
	<meta charset="utf-8">
	<title>CKEditor Sample</title>
	<script src="../ckeditor.js"></script>
	<script src="js/sample.js"></script>
	<link rel="stylesheet" href="css/samples.css">
	<link href="estilo.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="toolbarconfigurator/lib/codemirror/neo.css">
</head>

<body id="main">

	<nav class="navigation-a">
		<div class="grid-container">
			<ul class="navigation-a-left grid-width-70">
			<li><a href="index.html" class="button-a button-a-background">INICIO</a></li>
				<li><a href="http://ckeditor.com">ATIVIDADES</a></li>
				<li><a href="https://github.com/ckeditor/ckeditor-dev/issues">CIPEIROS</a></li>
				<li><a href="http://github.com/ckeditor/ckeditor-dev"
						class="icon-pos-right icon-navigation-a-github">CIPATI</a></li>
			</ul>
			
		</div>
	</nav>
<div>
    <div id="formulario">
    		<?php
        		$action = $_GET["action"];
			if($action == true){
				$destino = "leonardomm@gmail.com";
				$nome = $_POST["nome"];
				$email = $_POST["email"];
				$fone = $_POST["fone"];
				$assunto = $_POST["assunto"];
				$mensagem = $_POST["mensagem"];
				$data = date("d")."/".date("m")."/".date("Y")." - ".date("H").":".date("i").":".date("s");
				
				$msg = "<h1>Mensagem enviada pelo site www.cipaassessoria.net.br</h1>";
				$msg .= "<p>Data de envio: ".$data."</p>";
				$msg .= "<p>Envada por: $nome</p>";
				$msg .= "<p>E-mail: $email</p>";
				$msg .= "<p>Telefone: $fone</p>";
				$msg .= "<p>Assunto: $assunto</p>";
				$msg .= "<p>Mensagem: $mensagem</p>";
				if(mail($destino, "Enviado pelo site", $msg)){
					echo "<span class='sucesso'>Mensagem enviada com sucesso! Em breve entraremos em contato com você.</span>";
				} else {
					echo "<span class='erro'>Houve um erro ao enviar sua mensagem, por favor tente novamente ou caso o erro persista envie um e-mail para cipaassessoria@bol.com.br informando a falha.</span>";
				}
			}
		?>
    		<form action="#" method="post">
        		<label for="nome">Nome:
            		<input type="text" id="nome" name="nome" tabindex="1">   
            </label>
            <label for="email">E-mail:
            		<input type="email" id="email" name="email" tabindex="2">   
            </label>
            <label for="fone">Telefone:
            		<input type="text" id="fone" name="fone" tabindex="3">   
            </label>
            <label for="assunto">Assunto:
            		<input type="text" id="assunto" name="assunto" tabindex="4">   
            </label>
            <label for="mensagem">Mensagem:
            		<textarea id="mensagem" name="mensagem" tabindex="5"></textarea>
            </label> 
            <input type="submit" value="Enviar mensagem" tabindex="6">
        </form>
    </div>
    <div id="dados-mapa">
    		<h2>(64) 3623-1127 / 8405-7288 / 9907-423</h2>
    		<p>Rua 12, 929 - Jardim América</p>
        <p>Rio Verde - GO - CEP: 75903-179</p>
        <p>cipaassessoria@bol.com.br</p>
        <br>
    		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1899.577575803333!2d-50.92346270000002!3d-17.78440390000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9361db5dd4930231%3A0x7fb1069dfdd2ecb9!2sR.+12%2C+929+-+St.+Dona+Gercina%2C+Rio+Verde+-+GO%2C+75904-562!5e0!3m2!1spt-BR!2sbr!4v1430741504829" width="450" height="250" frameborder="0" style="border:0"></iframe>
    </div>
</div>
<nav id="nav-inferior"><a href="javascript:history.back(-1);">Voltar</a> | <a href="#topo">Topo</a></nav>
<?php include "base.php"; ?>