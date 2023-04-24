<?php
include_once 'alunoHelper.php';
include_once 'aluno.php';
include_once 'banco.php';
include_once 'encontros.php';
include_once 'encontrosHelper.php';

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
			<!--<li>
				<a href="#">
					<i class='bx bxs-cog'></i>
					<span class="text">Configuração</span>
				</a>-->
			</li>
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
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="#" class="notification">
				<i class='bx bxs-bell'></i>
				<span class="num">8</span>
			</a>
			<a href="#" class="profile">
				<img src="img/people.png">
			</a>-->
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Orientador</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Estágio</a>
						</li>
						<li><i class='bx bx-chevron-right'></i></li>
						<li>
							<a class="active" href="opção_usuario.php">Home</a>
						</li>
					</ul>
				</div>
				</a>
				<?php
						echo '<a href="notasPROF.php? matricula='.$aluno->matricula.'">Resultados</a>'
					?>
			</div>


			<!-------------------------------------------------------------------------------->




			<!-------------------------------------------------------------------------------->
			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Encontros</h3>

						<form name="formCad" method="POST" action="encontrosHelper.php" target="_self">
						
						<input type="submit" value="Salvar">
					</div>

					<div>
						
							<div class="teste">
								<input class="teste3" readonly type="text" placeholder="Nome" value="<?php echo $aluno->nome; ?>">
							</div>

							  <div class="teste2">
								<div class="testeNaoSeiQual">
								<input class="teste3" type="" readonly placeholder="Curso" value="<?php echo $aluno->id_curso; ?>">
								</div>

								<div class="testeNaoSeiQual">
									<input class="teste3" readonly type="text"name ="matricula" placeholder="Matricula" value="<?php echo $aluno->matricula; ?>">
								</div>
							</div>

							<div class="teste2">
								<div class="testeNaoSeiQual">
									<input class="teste3" readonly type="" placeholder="Setor" value="<?php echo $aluno->setor; ?>">
								</div>

								<div class="testeNaoSeiQual">
									<input class="teste3" readonly type="" placeholder="Empresa" value="<?php echo $aluno->empresa; ?>">
								</div>
						
							</div>

							<input type="text" name="tipo" style="display: none" value="cadastrarEncontros">


							<div class="encontros">
								<div class="encontro1">

									<label for="encontro1">Encontro 1: </label> <input class="enc" type="date" name="encontro1" value="<?php
																																			if (isset($encontros->encontro1)) {
																																				echo $encontros->encontro1->format('Y-m-d');
																																			} ?>">
								</div>

								<div class="encontro2">
									<label for="encontro2">Encontro 2: </label> <input class="enc" type="date" name="encontro2" value="<?php
																																				if (isset($encontros->encontro2)) {
																																					echo $encontros->encontro2->format('Y-m-d');
																																				} ?>">
								</div>

								<div class="encontro3">
									<label for="encontro3">Encontro 3: </label> <input class="enc" type="date" name="encontro3" value="<?php
																																				if (isset($encontros->encontro3)) {
																																					echo $encontros->encontro3->format('Y-m-d');
																																				} ?>">
								</div>




							</div>
						</div>
						</form>


					</div>
				</div>

				<table>
					<thead>
					</thead>
				</table>





				<!-- <script type="text/javascript">
$(function () {
$("#BirthDate").mask("00/00/0000");

$("#BirthDate").datepicker({
changeMonth: true,
changeYear: true,
format: 'dd/mm/yyyy'
});
});
</script> -->












				<!-------------------------------------------------------------------------------->

			</div>
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->


	<script src="script.js"></script>
</body>

</html>