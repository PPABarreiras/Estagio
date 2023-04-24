<?php
include_once 'alunoHelper.php';
include_once 'aluno.php';
include_once 'banco.php';
include_once 'notas_estagio.php';
include_once 'notas_estagioHelper.php';

$matricula = filter_input(
	INPUT_GET,
	'matricula',
	FILTER_SANITIZE_NUMBER_INT
);


$aluno = Aluno::carregar($matricula);
$notas_estagio = Notas_estagio::carregarNotas_estagio($matricula);

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
			<!--<li>
				<a href="#">
					<i class='bx bxs-cog'></i>
					<span class="text">Configuração</span>
				</a>
			</li>-->
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
			<!--<a href="#" class="nav-link"></a>
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
			</a>-->
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Coordenações</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Estágio</a>
						</li>
						<li><i class='bx bx-chevron-right'></i></li>
						<li>
							<a class="active" href="estagioC.php">Home</a>
						</li>
					</ul>
				</div>
				<!--<a href="#" class="btn-download">
					<span class="text">Downloads PDF</span>
				</a>-->
			</div>
			<!-- Calendario, Alunos, Total de Aprovados -->
			
				
				


			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Estágiarios</h3>
						<form name="formCad" method="POST" action="notas_estagioHelper.php" target="_self">
						<!--<input type="submit" value="Salvar">-->
						
					</div>
					
					
					<input type="text" name="tipo" style="display: none" value="cadastrarNotas_estagio">
					<div class="teste">
								<input readonly class="teste3" type="text" placeholder="Nome" value="<?php echo $aluno->nome; ?>">
						
								<input readonly class="teste3" type="text"name ="matricula" placeholder="Matricula" value="<?php echo $aluno->matricula; ?>">
								
					</div>

					<table>
						<!-- Tabela  -->
						<thead>
							<tr>
								<th>Avaliação</th>
								<th>Peso</th>
								<th> Nota</th>
								
							</tr>


						</thead>

						<tbody>

							<tr>
								<td>
									<p>Relatório</p>
								</td>

								<td>
									<p> 0.3</p>
								</td>
								<td>
								
									<div class="input6-box6">
										<input readonly id="nota_relatorio" type="text" name="nota_relatorio" placeholder="Qual a nota?" required value="<?php
																																							if (isset($notas_estagio->nota_relatorio)) {
																																								echo $notas_estagio->nota_relatorio;
																																						} ?>">
									</div>
								</td>
							






							<tr>
								<td>
									<p>Orientador</p>
								</td>

								<td>
									<p> 0.2</p>
								</td>
								<td>

									<div class="input6-box6">
										<input readonly id="nota_orientador" type="text" name="nota_orientador" placeholder="Qual a nota?" required value="<?php
																																								if (isset($notas_estagio->nota_orientador)) {
																																									echo $notas_estagio->nota_orientador;
																																							} ?>">
									</div>
								</td>
								




							<tr>
								<td>
									<p>Empresa</p>
								</td>

								<td>
									<p> 0.4</p>
								</td>
								<td>

									<div class="input6-box6">
										<input readonly id="nota_empresa" type="text" name="nota_empresa" placeholder="Qual a nota?" required value="<?php
																																						if (isset($notas_estagio->nota_empresa)) {
																																							echo $notas_estagio->nota_empresa;
																																					} ?>">
									</div>
								</td>
							




							<tr>
								<td>
									<p>Aluno</p>
								</td>

								<td>
									<p> 0.1</p>
								</td>
								<td>
									<div class="input6-box6">
										<input readonly id="nota_aluno" type="text" name="nota_aluno" placeholder="Qual a nota?" required value="<?php
																																					if (isset($notas_estagio->nota_aluno)) {
																																						echo $notas_estagio->nota_aluno;
																																				} ?>">
									</div>
								</td>
								<!--<td>

									<div class="input6-box6">
										<input id="firstname" type="text" name="firstname" placeholder="Qual a nota Final?" required>

								</td>-->

								<?php
									$aprovado = null;
									$aprovado = null;
									if(isset($notas_estagio->nota_final)>=6){
										$aprovado = "checked";
										$reprovado = " ";
									} else {
										$reprovado = "checked";
										$aprovado = " ";
									}   
								?>
			
							<tr>
								<td>
									

									<p>
									<div class="gender-input">
										<input readonly id="reprovado" type="radio" <?php echo $reprovado; ?> name="resultado" value="reprovado">
										<label for="reprovado">Reprovado</label>
										</p>
									</div>

								</td>
								<td>


									<p>
									<div class="gender-input">
										<input readonly id="aprovado" type="radio" <?php echo $aprovado; ?> name="resultado" value="aprovado">
										<label for="aprovado">Aprovado</label>
										</p>
									</div>

								</td>
								<td>


									<p>
									<div class="input6-box6">
										<label for="notaFinal">Nota Final</label>
										<input id="nota_final" type="text" name="nota_final" readonly value="<?php
																												if (isset($notas_estagio->nota_final)) {
																													echo $notas_estagio->nota_final;
																											} ?>">
										</p>
									</div>

								</td>
							</tr>
							</form>











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