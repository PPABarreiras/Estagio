<?php
include_once 'aluno.php';
include_once 'banco.php';

if (isset($_POST['tipo'])) {
    $tipo = $_POST['tipo'];

    if ($tipo === 'cadastrarAluno') {
        cadastrarAluno();
    } else if ($tipo === "editar") {
        editar_aluno();
    } else if ($tipo === "visualizar") {
        visualizar_Aluno();
    } else if ($tipo === "encontros") {
        encontros_Aluno();
    }else if($tipo === "anexar"){
        fazerUpload();
    }
}




function editar_aluno()
{

    $matricula = $_POST['matricula'];
    $nome = $_POST['nome'];
    $turma = $_POST['turma'];
    $email = $_POST['email'];
    $telefone  = $_POST['telefone'];
    $orientador  = $_POST['orientador'];
    $setor  = $_POST['setor'];
    $empresa  = $_POST['empresa'];
    $remunerado  = $_POST['remunerado'];
    $id_curso = $_POST['id_curso'];

    $aluno = new Aluno($matricula, $nome, $turma, $email, $telefone, $orientador, $setor, $empresa, $remunerado, $id_curso);
    $aluno->matricula = $matricula;

    $aluno->editar();
    header("Location:estagioC.php");
}
function visualizar_Aluno()
{

    $matricula = $_POST['matricula'];
    $nome = $_POST['nome'];
    $turma = $_POST['turma'];
    $email = $_POST['email'];
    $telefone  = $_POST['telefone'];
    $orientador  = $_POST['orientador'];
    $setor  = $_POST['setor'];
    $empresa  = $_POST['empresa'];
    $remunerado  = $_POST['remunerado'];
    $id_curso = $_POST['id_curso'];

    $aluno = new Aluno($matricula, $nome, $turma, $email, $telefone, $orientador, $setor, $empresa, $remunerado, $id_curso);
    $aluno->matricula = $matricula;

    $aluno->visualizar();
    fazerUpload($aluno);
    header("Location:encontrosPROF.php");
}

function encontros_Aluno()
{

    $matricula = $_POST['matricula'];
    $nome = $_POST['nome'];
    $turma = $_POST['turma'];
    $email = $_POST['email'];
    $telefone  = $_POST['telefone'];
    $orientador  = $_POST['orientador'];
    $setor  = $_POST['setor'];
    $empresa  = $_POST['empresa'];
    $remunerado  = $_POST['remunerado'];
    $id_curso = $_POST['id_curso'];
    $aluno = new Aluno($matricula, $nome, $turma, $email, $telefone, $orientador, $setor, $empresa, $remunerado, $id_curso);

    $aluno->encontros();

    header("Location:notasPROF.php");
}



function cadastrarAluno()
{
    $matricula = $_POST['matricula'];
    $nome = $_POST['nome'];
    $turma = $_POST['turma'];
    $email = $_POST['email'];
    $telefone  = $_POST['telefone'];
    $orientador  = $_POST['orientador'];
    $setor  = $_POST['setor'];
    $empresa  = $_POST['empresa'];
    $remunerado  = $_POST['remunerado'];
    $id_curso = $_POST['id_curso'];

    $aluno = new Aluno($matricula, $nome, $turma, $email, $telefone, $orientador,  $setor, $empresa,  $remunerado, $id_curso);

    $aluno->inserir();

    header("Location:estagioC.php");
}

function fazerUpload()
{
    $matricula = $_POST['matricula'];
    $aluno = Aluno::carregar($matricula);

    $dir = "uploads/";


    mkdir("uploads/" . $aluno->matricula);

    $dir = "uploads/" . $aluno->matricula . "/";

    $arquivo = $dir . basename($_FILES["fname"]["name"]);
   
    $uploadOK = 1;
    $tipo = strtolower(pathinfo($arquivo, PATHINFO_EXTENSION));

    
    if ($tipo != "pdf") {
        $uploadOK = 0;
    }

    if ($_FILES["fname"]["size"] > 5000000) {
        $uploadOK = 0;
    }

    if ($uploadOK == 0) {
        echo "Não foi possível fazer o download";
    } else {
        if (move_uploaded_file($_FILES["fname"]["tmp_name"],  $arquivo)) {
            $aluno->documento = $arquivo;
            $aluno->salvar();
        } else {
            echo "Erro ao fazer upload do arquivo";
        }
    }
    header('location:estagioC.php');
}
function getAlunos()
{
    try {

        $banco = new Banco();
        $conexao = $banco->conectar();
        $stmt = $conexao->prepare("select * from aluno");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $alunos = array();
        foreach ($stmt->fetchAll() as $v => $value) {
            $aluno = new Aluno(
                $value['matricula'],
                $value['nome'],
                $value['turma'],
                $value['email'],
                $value['telefone'],
                $value['orientador'],
                $value['setor'],
                $value['empresa'],
                $value['remunerado'],
                $value['id_curso']

            );
            $aluno->matricula = $value['matricula'];
            $aluno->documento = $value['documento'];

            array_push($alunos, $aluno);
        }

        return $alunos;
    } catch (PDOException $ex) {
        echo 'Erro: ' . $ex->getMessage();
    }
}