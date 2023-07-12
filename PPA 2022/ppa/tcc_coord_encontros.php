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
			<img id="imagem" src="img/e372595e-1852-4c68-b86c-2d0d43eee7c5-removebg-preview.png" alt="Coordenação">


		</a> <!-- nome estágio da parte de cima -->
		<ul class="side-menu top">
			<li class="active">
				<a href="tcc_coord_index.php">
					<i class=' bx bx-detail'></i>
					<span class="text">TCC</span>
				</a>
			</li>
			<li>
				<a href="tcc_coord_anexo.php">
					<i class='bx bx-import'></i>
					<span class="text">Anexos</span>
				</a>
			</li>


		</ul>
		<ul class="side-menu">
			<li>
				<a href="#">
					<i class='bx bxs-cog'></i>
					<span class="text">Configuração</span>
				</a>
			</li>
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
			<form action="#">
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
							<a href="#">Tcc</a>
						</li>
						<li><i class='bx bx-chevron-right'></i></li>
						<li>
							<a class="active" href="opção_usuario.php">Home</a>
						</li>
					</ul>
				</div>
				<a href="notas.php" class="btn-download">
					<span class="text">Resultados</span>
				</a>
			</div>


			<!-------------------------------------------------------------------------------->




			<!-------------------------------------------------------------------------------->
			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Encontros para o Tcc</h3>

					</div>

					<div>
						<div class="teste">
							<input class="teste3" type="" placeholder="Nome">
						</div>
						<div>
							<div class="teste2">
								<div class="testeNaoSeiQual">
									<input class="teste3" type="" placeholder="Curso">
								</div>

								<div class="testeNaoSeiQual">
									<input class="teste3" type="" placeholder="Turma">
								</div>
							</div>

							<div class="teste2">
								<div class="testeNaoSeiQual">
									<input class="teste3" type="" placeholder="Setor">
								</div>

								<div class="testeNaoSeiQual">
									<input class="teste3" type="" placeholder="Empresa">
								</div>
							</div>

							<div class="encontros">
								<div class="encontro1">
									<label for="encontoI">1º encontro: </label>
									<input class="enc" type="date" name="encontroI">
								</div>

								<div class="encontro2">
									<label for="encontoI">2º encontro: </label>
									<input class="enc" type="date" name="encontroI">
								</div>

								<div class="encontro3">
									<label for="encontoI">3º encontro: </label>
									<input class="enc" type="date" name="encontroI">
								</div>

							</div>


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