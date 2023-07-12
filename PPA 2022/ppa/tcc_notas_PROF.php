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
					<h1>Coordenações</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Estágio</a>
						</li>
						<li><i class='bx bx-chevron-right'></i></li>
						<li>
							<a class="active" href="tcc_PROF_index.php">Home</a>
						</li>
					</ul>
				</div>
			</div>
			<!-- Calendario, Alunos, Total de Aprovados -->
			
				
				


			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>TCC</h3>
						<form name="formCad" method="POST" action="notasTCCHelper.php" target="_self">
						<input type="submit" value="Salvar">
						
					</div>
					
					
					<input type="text" name="tipo" style="display: none" value="cadastrarNotas_tcc">
					<div class="teste">
								<input readonly class="teste3" type="text" placeholder="Nome" value="<?php echo $alunotcc->nome; ?>">
						
								<input readonly class="teste3" type="text"name ="matriculatcc" placeholder="Matricula" value="<?php echo $alunotcc->matriculatcc; ?>">
								
					</div>

					<table>
						<!-- Tabela  -->
						<thead>
							<tr>
								<th>Avaliador</th>
								<th> Nota</th>
								
							</tr>


						</thead>

						<tbody>

							<tr>
								<td>
									<p>Avaliador 1</p>
								</td>
								<td>
								
									<div class="input6-box6">
										<input id="nota_relatorio" type="text" name="avaliador1" placeholder="Qual a nota?" required value="<?php
																																				if (isset($notas_tcc->avaliador1)) {
																																					echo $notas_tcc->avaliador1;
																																			} ?>">
									</div>
								</td>
							






							<tr>
								<td>
									<p>Avaliador 2</p>
								</td>
								<td>

									<div class="input6-box6">
										<input id="nota_orientador" type="text" name="avaliador2" placeholder="Qual a nota?" required value="<?php
																																				if (isset($notas_tcc->avaliador2)) {
																																					echo $notas_tcc->avaliador2;
																																			} ?>">
									</div>
								</td>
								




							<tr>
								<td>
									<p>Avaliador 3</p>
								</td>
								<td>

									<div class="input6-box6">
										<input id="nota_empresa" type="text" name="avaliador3" placeholder="Qual a nota?" required value="<?php
																																				if (isset($notas_tcc->avaliador3)) {
																																					echo $notas_tcc->avaliador3;
																																			} ?>">
									</div>
								</td>
							




							<tr>
								<td>
									<p>Avaliador 4</p>
								</td>
								<td>

									<div class="input6-box6">
										<input id="nota_aluno" type="text" name="avaliador4" placeholder="Qual a nota?" value="<?php
																																	if (isset($notas_tcc->avaliador4)) {
																																		echo $notas_tcc->avaliador4;
																																}?>">
									</div>
								</td>
								<!--<td>

									<div class="input6-box6">
										<input id="firstname" type="text" name="firstname" placeholder="Qual a nota Final?" required>

								</td>-->

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
			
							<tr>
								<td>
									

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

								</td>
								<td>


									<p>
									<div class="input6-box6">
										<label for="notaFinal">Nota Final</label>
										<input id="nota_final" type="text" name="nota_final" readonly value="<?php
																												if (isset($notas_tcc->nota_final)) {
																													echo $notas_tcc->nota_final;
																											}?>">
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