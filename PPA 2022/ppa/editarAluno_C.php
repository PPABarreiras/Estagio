<?php

   include_once 'aluno.php';
   include_once 'cursoHelper.php';
    $matricula = filter_input(
        INPUT_GET,
        'matricula',
        FILTER_SANITIZE_NUMBER_INT
    );

   
    $aluno = Aluno::carregar($matricula);
   //echo "Editar aluno:  " . $matricula; 
  
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
				<a href="tcc_coord_index.php">
					<i class='bx bx-detail'></i>
					<span class="text">TCC</span>
				</a>
			</li>




		</ul>
		<ul class="side-menu">
			
			<li>
				<a href="login_usuario.php" class="logout">
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
				<h3>Editar Aluno</h3>

						<form action="alunoHelper.php" method="POST">
							<!--  <a href="estagioC.php" class="btn-download">
				         	<span class="text">Salvar</span>
				</a> 
-->
                         <input type="submit" value="Salvar">
					      </div>
						  <!-----Não colocou form name "essa porra aqui vai pra onde giselle?  tem que colocar essa bagaça garota"------------------------------------------------------->
                            <!-------erro em estagio C no id do editar aluno.... o id é matricula porra kkkkkkkk---------------------------------------------------->
						    <form name="formCad" method="POST" action="alunoHelper.php" target="_self">
							<input type="text" name="tipo" style="display: none" value="editar">
							<div>


							<div class="teste">
							<input value= "<?php  echo $aluno->nome; ?>" name="nome" class="teste3" type="text" placeholder="Nome">
							</div>

							<div class="teste2">
							<div class="testeNaoSeiQual">
							<input value= "<?php  echo  $aluno->matricula; ?>"  readonly name="matricula" class="teste3" type="text" placeholder="Matricula">

							</div>
							<div class="testeNaoSeiQual">
							<input value= "<?php  echo $aluno->turma;?>" name="turma" class="teste3" type="number" placeholder="Turma">
							</div>
							</div>

							<div class="teste2">
							<div class="testeNaoSeiQual">

							<input value= "<?php  echo $aluno->email;?>"  name="email" class="teste3" type="email" placeholder="Email">
							</div>

							<div class="testeNaoSeiQual">
							<input value= "<?php  echo $aluno->telefone;?>"  name="telefone" class="teste3" type="number" placeholder="Telefone">
							</div>
							</div>

							    <div>
							<div class="teste">
							<input value= "<?php  echo $aluno->orientador;?>"  name="orientador" class="teste3" type="" placeholder="Orientador">
								</div>

								<div class="teste2">
							<div class="testeNaoSeiQual">
							<input value= "<?php  echo $aluno->setor;?>"  name="setor" class="teste3" type="text" placeholder="Setor">

							</div>
							<div class="testeNaoSeiQual">
							<input value= "<?php  echo $aluno->empresa;?>"  name="empresa" class="teste3" type="text" placeholder="Empresa">
							</div>
							</div>

							<div class="teste2">
							<div class="testeNaoSeiQual">
							<input value= "<?php  echo $aluno->remunerado;?>"  name="remunerado" class="teste3" type="text" placeholder="Remunerado">

							</div>
							
							<div  class="testeNaoSeiQual"> 
							<select   class="teste3" name="id_curso" id="cursos">
								
								<?php
								$cursos = getCursos();
								foreach($cursos as $curso){
								echo '<option   value="'.$curso->id_curso.'">'.$curso->nome.'</option>';
								}
							    ?> 

								</select>
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