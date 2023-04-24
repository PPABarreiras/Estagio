<?php
include_once 'alunoHelper_tcc.php';
include_once 'tcc.php';
include_once 'banco.php';
include_once 'encontrosTCC.php';
include_once 'encontrosTCChelper.php';

$matriculatcc = filter_input(
	INPUT_GET,
	'matriculatcc',
	FILTER_SANITIZE_NUMBER_INT
);


$alunotcc = Alunotcc::carregar($matriculatcc);
$encontrosTCC = EncontrosTCC::carregarEncontrosTCC($matriculatcc);

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
			</a>
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
						echo '<a href="tcc_notas_PROF.php? matriculatcc='.$alunotcc->matriculatcc.'">Resultados</a>'
					?>
			</div>


			<!-------------------------------------------------------------------------------->




			<!-------------------------------------------------------------------------------->
			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Encontros</h3>

						<form name="formCad" method="POST" action="encontrosTCChelper.php" target="_self">
						
						<input type="submit" value="Salvar">
					</div>

					<div>
						
							<div class="teste">
								<input class="teste3" type="text" placeholder="Nome" value="<?php echo $alunotcc->nome; ?>">
							</div>

							  <div class="teste2">
								<div class="testeNaoSeiQual">
								<input class="teste3" type="" placeholder="Curso" value="<?php echo $alunotcc->id_curso; ?>">
								</div>

								<div class="testeNaoSeiQual">
									<input class="teste3" type="text"name ="matriculatcc" placeholder="Matriculatcc" value="<?php echo $alunotcc->matriculatcc; ?>">
								</div>
							</div>

							

							<input type="text" name="tipo" style="display: none" value="cadastrarEncontrosTCC">
							  <div class="encontros">
								<div class="encontro1">
									<label for="enconto1">1º encontro: </label>
									<input class="enc" type="date" name="encontro1" value="<?php
																							if (isset($encontrosTCC->encontro1)) {
																								echo $encontrosTCC->encontro1->format('Y-m-d');
																							} ?>">
								</div>

								<div class="encontro2">
									<label for="enconto2">2º encontro: </label>
									<input class="enc" type="date" name="encontro2" value="<?php
																							if (isset($encontrosTCC->encontro2)) {
																								echo $encontrosTCC->encontro2->format('Y-m-d');
																							} ?>">>
								</div>

								<div class="encontro3">
									<label for="enconto3">3º encontro: </label>
									<input class="enc" type="date" name="encontro3" value="<?php
																							if (isset($encontrosTCC->encontro3)) {
																								echo $encontrosTCC->encontro3->format('Y-m-d');
																							} ?>">>
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