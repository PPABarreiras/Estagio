<?php
include_once 'alunoHelper_tcc.php';
include_once 'cursoHelper.php';
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
					<h1>Coordenações</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Tcc</a>
						</li>
						
					</ul>
				</div>
				<!--<a href="tcc_coord_cadastrarAluno.php" class="btn-download">
                    <span class="text">Cadastrar</span>-->
                </a>
			</div>

			
				

			<!-------------------------------------------------------------------------------->
			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>TCCs</h3>

						
					</div>
					<table>
					<form name="formCad" method="POST" action="alunoHelper_tcc.php" target="_self">
					<input style="display: none" name="tipo" id="tipo" type="text" value="cadastrar">
                                 
						<thead>
							<tr>
							       <th>Matricula</th>
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>Curso</th>   
                                    <th>Turma</th> 

							</tr>
						</thead>
						<tbody>
						</tr>
							

						</form>
						</tbody>

					<?php
                        $alunostcc = getAlunotcc();
                        foreach ($alunostcc as $alunotcc) {
                            echo '<tr>';
                            echo '<td>' . $alunotcc->matriculatcc . '</td>';
                            echo '<td>' . $alunotcc->nome . '</td>';
                            echo '<td>' . $alunotcc->email . '</td>';
                            echo '<td>' . $alunotcc->id_curso . '</td>';
                            echo '<td>' . $alunotcc->turma . '</td>';
                            
                            echo '<td><a href="' .$alunotcc->documento.'"> <img src="https://www.iconpacks.net/icons/2/free-pdf-file-icon-3382-thumb.png" alt=""> '.
                            
                            '</td>';
                            echo '<td> <a href="tcc_PROF_visualizar.php? matriculatcc='.$alunotcc->matriculatcc.'">Visualizar</a></td>';
                            echo '<td> <a href="tcc_anexo_PROF.php? matriculatcc='.$alunotcc->matriculatcc.'">Anexar</a></td>';
                           
                            echo '</tr>';
                           
                        }

                        ?>
                    </table>

					</div>
		