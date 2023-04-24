<?php
include_once 'alunoHelper.php';
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
                <a href="estagioC.php">
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
                            <a href="#">Orientador</a>
                        </li>
                       
                    </ul>
                </div>

                <!--<a href="cadastrarC_Aluno.php" class="btn-download">
                    <span class="text">Cadastrar</span>
                </a>-->

            </div>


            <!-------------------------------------------------------------------------------->
            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3>Estágiarios</h3>

                        <i class='bx bx-filter'></i>
                       </div>
                         <table>
                          
                            <form name="formCad" method="POST" action="alunoHelper.php" target="_self">
                            <input style="display: none" name="tipo" id="tipo" type="text" value="cadastrarAluno">
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
                        $alunos = getAlunos();
                        foreach ($alunos as $aluno) {
                            echo '<tr>';
                            echo '<td>' . $aluno->matricula . '</td>';
                            echo '<td>' . $aluno->nome . '</td>';
                            echo '<td>' . $aluno->email . '</td>';
                            echo '<td>' . $aluno->id_curso . '</td>';
                            echo '<td>' . $aluno->turma . '</td>';
                            
                            
                            '</td>';
                            echo '<td> <a href="visualizarPROF.php?matricula='.$aluno->matricula.'">Visualizar</a></td>';
							echo '<td> <a href="anexoPROF.php?matricula='.$aluno->matricula.'">Anexar</a></td>';
                           
                            echo '</tr>';
                           
                        }

                        ?>
                    </table>
                    <img src= "" alt = "">
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