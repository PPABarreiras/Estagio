<?php

   include_once 'aluno.php';
   include_once 'cursoHelper.php';
   include_once 'alunoHelper.php';
   include_once 'encontrosHelper.php';
   include_once 'encontros.php';


    $matricula = filter_input(
        INPUT_GET,
        'matricula',
        FILTER_SANITIZE_NUMBER_INT
	);

   
    $aluno = Aluno::carregar($matricula);
	$encontros = Encontros::carregarEncontros($matricula);
  
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
				<a href="indexPROF.php">
					<i class=' bx bx-desktop'></i>
					<span class="text">Estágiarios</span>
				</a>
			</li>
			<li>
				<a href="tcc_PROF_index.php">
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
							<a href="#">Orientador</a>
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
				<h3>Visualizar Dados</h3>

						<form action="alunoHelper.php" method="POST">
							
                         
							<?php
								echo '<a href="encontrosPROF.php? matricula='.$aluno->matricula.'">Encontros</a>'
							?>
					      </div>
						    <form name="formCad" method="POST" action="alunoHelper.php" target="_self">
							<input type="text" name="tipo" style="display: none" value="visualizar">
							<div>

							<div class="teste">
							<input value= "<?php  echo $aluno->nome; ?>"  readonly name="nome" class="teste3" type="text" placeholder="Nome">
							</div>

							<div class="teste2">
							<div class="testeNaoSeiQual">
							<input value= "<?php  echo  $aluno->matricula; ?>"  readonly name="matricula" class="teste3" type="text" placeholder="Matricula">

							</div>
							<div class="testeNaoSeiQual">
							<input value= "<?php  echo $aluno->turma;?>" readonly name="turma" class="teste3" type="number" placeholder="Turma">
							</div>
							</div>

							<div class="teste2">
							<div class="testeNaoSeiQual">

							<input value= "<?php  echo $aluno->email;?>" readonly   name="email" class="teste3" type="email" placeholder="Email">
							</div>

							<div class="testeNaoSeiQual">
							<input value= "<?php  echo $aluno->telefone;?>"  readonly name="telefone" class="teste3" type="number" placeholder="Telefone">
							</div>
							</div>

							    <div>
							<div class="teste">
							<input value= "<?php  echo $aluno->orientador;?>" readonly  name="orientador" class="teste3" type="" placeholder="Orientador">
								</div>

								<div class="teste2">
							<div class="testeNaoSeiQual">
							<input value= "<?php  echo $aluno->setor;?>" readonly  name="setor" class="teste3" type="text" placeholder="Setor">

							</div>
							<div class="testeNaoSeiQual">
							<input value= "<?php  echo $aluno->empresa;?>" readonly  name="empresa" class="teste3" type="text" placeholder="Empresa">
							</div>
							</div>

							<div class="teste2">
							<div class="testeNaoSeiQual">
							<input value= "<?php  echo $aluno->remunerado;?>" readonly  name="remunerado" class="teste3" type="text" placeholder="Remunerado">

							</div>

							<div  class="testeNaoSeiQual"> 
								<input value= "<?php  echo $aluno->id_curso;?>" readonly  name="id_curso" class="teste3" type="text" placeholder="id_curso">
								</div>
							</div>
                                
								
                                  
								</div> 
								</form>
								<table>
									    <thead>
									    </thead>
								</table>

								</div>


</div>
</div>
</main>
<!-- MAIN -->
</section>
<!-- CONTENT -->


<script src="script.js"></script>
</body>

</html>