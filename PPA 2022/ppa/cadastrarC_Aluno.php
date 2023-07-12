<?php 
include_once 'alunoHelper.php';
include_once 'cursoHelper.php';

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet' >
	<link rel="stylesheet" href="style.css">

	<title>Coordenação</title>
</head>

<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<img id="imagem" src="img/Cópia_de_LOGO_COINF__1_-removebg-preview.png" alt="Coordenação">


		</a> <!-- nome estágio da parte de cima -->
		<ul class="side-menu top">
			<li class="active">
				<a href="estagioC.php">
					<i class=' bx bx-desktop'></i>
					<span class="text">Estágiarios</span>
				</a>
			</li>
			<li>
				<a href="">
					<i class='bx bx-detail'></i>
					<span class="text">TCC</span>
				</a>
			</li>




		</ul>
		<ul class="side-menu">
			
	
			<li>
				<a href="login.php" class="logout">
					<i class='bx bxs-log-out-circle'></i>
					<span class="text">Sair</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->



	    <!-- CONTENT -->
	    <section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu'></i>
			<a href="#" class="nav-link"></a>
			<!--<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
				</div>
			</form>-->
			
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Coordenações</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Coordenador</a>
						</li>
						
					</ul>
				</div>

				<!------------------Botão de salvar as informações do Aluno na tela cadastrar------------------------>


				
			</div>


			<!-------------------------------------------------------------------------------->




			<!-------------------------------------------------------------------------------->
			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Cadastrar Aluno</h3>

						<form action="alunoHelper.php" method="POST">
							<!--  <a href="estagioC.php" class="btn-download">
				         	<span class="text">Salvar</span>
				</a> 
-->
							<input type="submit" value="Salvar">
					  </div>   
					       <form name="formCad" method="POST" action="alunoHelper.php" target="_self">
							
							<input type="text" name="tipo" style="display: none" value="cadastrarAluno">
							<div>
								
							<div class="teste">
							<input name="nome" class="teste3" type="text" placeholder="Nome">
							</div>

							<div class="teste2">
							<div class="testeNaoSeiQual">
							<input name="matricula" class="teste3" type="text" placeholder="Matricula">

							</div>
							<div class="testeNaoSeiQual">
							<input name="turma" class="teste3" type="number" placeholder="Turma">
							</div>
							</div>

							<div class="teste2">
							<div class="testeNaoSeiQual">

							<input name="email" class="teste3" type="email" placeholder="Email">
							</div>

							<div class="testeNaoSeiQual">
							<input name="telefone" class="teste3" type="number" placeholder="Telefone">
							</div>
							</div>

							    <div>
							<div class="teste">
							<input name="orientador" class="teste3" type="text" placeholder="Orientador">
								</div>

								<div class="teste2">
							<div class="testeNaoSeiQual">
							<input name="setor" class="teste3" type="text" placeholder="Setor">

							</div>
							<div class="testeNaoSeiQual">
							<input name="empresa" class="teste3" type="text" placeholder="Empresa">
							</div>
							</div>

							<div class="teste2">
							<div class="testeNaoSeiQual">
							<input name="remunerado" class="teste3" type="text" placeholder="Remunerado">

							</div>
							
							<div  class="testeNaoSeiQual"> 
							<select   class="teste3" name="id_curso" id="id_curso">
								
								<?php
								$cursos = getCursos();
								foreach($cursos as $curso){
								echo '<option   value="'.$curso->id_curso.'">'.$curso->nome.'</option>';
								}
							    ?> 

								</select>
								</div>
							</div>
				
                                  
								</div> 
								<div class="encontros">
								<div class="encontro1">

								<label for="enconto3">Encontro 1: </label> 
								<input readonly class="enc" type="date" name="encontro1">
								</div>

								<div class="encontro2">
								<label for="enconto2">Encontro 2: </label> 
								<input readonly class="enc" type="date" name="encontro2">
								</div>

								<div class="encontro3">
							    <label for="enconto3">Encontro 3: </label>
								<input readonly class="enc" type="date" name="encontro3">
								</div>
										
										
								</div>
								</div>
								</form>
								<table>
									    <thead>
									    </thead>
								</table>