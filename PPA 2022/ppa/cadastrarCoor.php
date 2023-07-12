<?php
    include_once 'coorHelper.php';
    include_once 'cursoHelper.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Cadastro</title>
</head>

<body>
    <div class="container1">
        <div class="form1-imagem2">

            <div class="form1">
                <form name="formCad" method="POST" action="coorHelper.php" target="_self">
                <input style="display: none" name="tipo" id="tipo" type="text" value="cadastrarCoor">
                    <div class="form1-header">
                        <div class="title">
                            <h4>Cadastrar</h4>
                        </div>

                    </div>

                    <div class="input-group">
                        <div class="input-box">
                            <label for="siape">Siape</label>
                            <input id="siape" type="text" name="siape" placeholder="Digite o siape" required>
                        </div>
                        <div class="input-box">
                            <label for="nome">Nome</label>
                            <input id="nome" type="text" name="nome" placeholder="Digite o nome" required>
                        </div>
                        <div class="input-box">
                            <label for="email">E-mail</label>
                            <input id="email" type="email" name="email" placeholder="Digite o e-mail" required>
                        </div>
                        <div class="input-box">
                            <label for="senha">Senha</label>
                            <input id="senha" type="password" name="senha" placeholder="Digite a senha" required>
                        </div>
                        <div class="input-box">
                        
                            <label for="id_curso">Id Curso</label>
                            <div class="aqui">
                            <select name='id_curso' id='id_curso'>
                            </div>
                                <?php

                                    $cursos = getCursos();
                                    foreach($cursos as $curso){
                                        echo '<option value="'.$curso->id_curso.'">'.$curso->nome.'</option>';
                                    }
                                ?>

                            </select>
                            
                            </div> 
                        </div>

                        <div class="input-box">
                        
                        <label for="nivel">Tipo</label>
                        <div class="aqui">
                        <select name='nivel' id='nivel'>
                        </div>
                        <option value="coordenador">Coordenador</option>
                        <option value="orientador">Orientador</option>
                        </select>
                        </div> 
                    </div>
                        <!--<div class="input-box">
                            <label for="confirmSenha">Confirme sua Senha</label>
                            <input id="confirmeSenha" type="password" name="confirmeSenha" placeholder="Digite novamente" required>
                        </div>-->


                    </div>

                    <div class="continue-button">
                        <!--<button><a href="entrar_usuario.php">Cadastrar</a> </button>-->
                        <input type="submit"  class="teste3" value="Cadastrar">
                    </div>
                </form>
                
                <?php
                /*$coors = getCoor();
                foreach ($coors as $coor) {
                    echo '<tr>';
                    echo '<td>' .$coor->nome .'</td>';
                    echo '<td>' .$coor->id_curso .'</td>';
                    echo '<td>' .$coor->email .'</td>';
                    echo '<td>' .$coor->siape .'</td>';
                    echo '<td>' .$coor->senha .'</td>';
                    echo '</tr>';  
                }*/
                ?>

            </div>
        </div>
</body>

</html>
