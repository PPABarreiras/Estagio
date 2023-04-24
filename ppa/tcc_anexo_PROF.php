
<?php

include_once 'tcc.php';

$matriculatcc = filter_input(
	INPUT_GET,
	'matriculatcc',
	FILTER_SANITIZE_NUMBER_INT
);

$alunotcc = Alunotcc::carregar($matriculatcc);
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
				<a href="tcc_PROF_index.php">
					<i class=' bx bx-detail'></i>
					<span class="text">TCC</span>
				</a>
			</li>
			<li>
				<a href="tcc_anexo_PROF.php">
					<i class='bx bx-desktop'></i>
					<span class="text">Estágiarios</span>
				</a>
			</li>



		</ul>
		<ul class="side-menu">
			
			<li>
				<a href="login.html" class="logout">
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
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
				</div>
			</form>
			
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Orientador</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">TCC</a>
						</li>
					
				</div>
				


			</div>

			

			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Anexo Do TCC</h3>

						<form action="alunoHelper_tcc.php" method="post" enctype="multipart/form-data">

					<input type="submit"   value="Salvar">
						

					</div>
					
					<input type="text" name="tipo" style="display: none" value="anexarDados">
					

						

					<div class="teste">
								<input value="<?php echo $alunotcc->nome; ?>" name="nome" class="teste3" type="text" placeholder="Nome">
							</div>

							<div class="teste2">
								<div class="testeNaoSeiQual">
									<input value="<?php echo  $alunotcc->matriculatcc; ?>" readonly name="matriculatcc" class="teste3" type="text" placeholder="Matricula">

								</div>
								
								<div class="testeNaoSeiQual">
									<input value="<?php echo $alunotcc->turma; ?>" readonly name="turma" class="teste3" type="number" placeholder="Turma">
								</div>
							
								</div>
						    <input type="file" name="fname"    id="fname">
							
				



							</form>

</div>
<table>

	<tbody>


	</tbody>
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