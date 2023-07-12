<?php
include_once 'alunoHelper_tcc.php';
include_once 'tcc.php';
include_once 'banco.php';
include_once 'notasTCC.php';
include_once 'notasTCCHelper.php';

$matriculatcc = filter_input(
	INPUT_GET,
	'matriculatcc',
	FILTER_SANITIZE_NUMBER_INT
);


$alunotcc = Alunotcc::carregar($matriculatcc);
$notas_tcc = Notas_tcc::carregarNotas_tcc($matriculatcc);

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="style.css">

	<title>Coordenação</title>
</head>

<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="index.php" class="brand">
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
					<h1>Coordenações</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">TCC</a>
						</li>
						<li><i class='bx bx-chevron-right'></i></li>
						<li>
							<a class="active" href="tcc_coord_index.php">Home</a>
						</li>
					</ul>
				</div>
				<!-- <a href="#" class="btn-download">
					<i class='bx bxs-cloud-download' ></i>
					<span class="text">Downloads PDF</span>
				</a> -->


			</div>


			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Anexo Do TCC</h3>

						<i class='bx bx-filter'></i>
					</div>
					<table>

						<tbody>



						<div class="input6-box6">
							<label for="notaFinal">Nota Final</label>
							<input id="nota_final" type="text" name="nota_final" readonly value="<?php
																									if (isset($notas_tcc->nota_final)) {
																										echo $notas_tcc->nota_final;
																								} ?>">
							</p>
						</div>



						</tbody>

				<?php
					$aprovado = null;
					$aprovado = null;
					if(isset($notas_tcc->nota_final)>=6){
						$aprovado = "checked";
						$reprovado = " ";
					} else {
						$reprovado = "checked";
						$aprovado = " ";
					}   
				?>

				<p>
				<div class="gender-input">
					<input readonly id="reprovado" type="radio" <?php echo $reprovado; ?> name="resultado" value="reprovado">
					<label for="reprovado">Reprovado</label>
					</p>
				</div>

				<br>


				<p>
				<div class="gender-input">
					<input readonly id="aprovado" type="radio" <?php echo $aprovado; ?> name="resultado" value="aprovado">
					<label for="aprovado">Aprovado</label>
					</p>
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