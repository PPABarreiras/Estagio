
<?php 
include_once 'alunoHelper.php';
include_once 'alunoHelper_tcc.php';
include_once 'cursoHelper.php';


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet' <!-- My CSS -->
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
				<a href="tcc_coord_index.php">
					<i class='bx bx-detail'></i>
					<span class="text">TCC</span>
				</a>
			</li>
			<li>
				<a href="estagioC.php">
					<i class=' bx bx-desktop'></i>
					<span class="Estágiarios">Estágiarios</span>
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
			
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Coordenações</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Tcc</a>
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

						<form action="alunoHelper_tcc.php" method="POST">
					
						<input type="submit" value="Salvar">
					</div>

					
					<form name="formCad" method="POST" action="alunoHelper_tcc.php" target="_self">
					<input type="text" name="tipo" style="display: none" value="cadastrar">
							<div>

						<div class="teste">
							<input  name="nome" class="teste3" type="" placeholder="Nome">
						</div>
						<div>

						<div class="teste2">
							<div class="testeNaoSeiQual">
							<input name="matriculatcc" class="teste3" type="text" placeholder="Matricula">

							</div>


							<div class="testeNaoSeiQual">
							<input name="telefone" class="teste3" type="number" placeholder="Telefone">
							</div>
							</div>

								<div class="teste2">
							<div class="testeNaoSeiQual">

							<input name="email" class="teste3" type="email" placeholder="Email">
							</div>


							<div class="testeNaoSeiQual">
							<input name="turma" class="teste3" type="number" placeholder="Turma">
							</div>
							</div>
							 <div>

						

							<div class="teste">
									<input name="tema" class="teste3" type="" placeholder="Tema Proposto">
								</div>


								<div class="teste2">
							<div class="testeNaoSeiQual">
							<input name="orientador" class="teste3" type="text" placeholder="Orientador">

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
				
                                  

								<div class="encontros">
									<div class="encontro1">
										<label for="encontoI">Data de Inicio: </label>
										<input class="enc" type="date" name="datainicio" value="datainicio">
									</div>

									<div class="encontro3">
										<label for="encontoI">Data da Defesa: </label>
										<input class="enc" type="date" name="datadefesa" value="datadefesa">
									</div>

									<div class="encontro3">
										<label for="encontoI">Data da Conclusão: </label>
										<input class="enc" type="date" name="dataconclusao" value="dataconclusao">
									</div>
									<div class="encontro3">
										<label for="encontoI">Previsão de termino: </label>
										<input class="enc" type="date" name="previsaotermino" value="previsaotermino">
									</div>

								</div>

							</div>
						</div>

						<table>
							<thead>
							</thead>
						</table>


						




            </div>
            </div>
        </main>
       
		</section>
    <!-- CONTENT -->


    <script src="script.js"></script>
</body>

</html>

		