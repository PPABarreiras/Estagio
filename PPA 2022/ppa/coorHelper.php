<?php
include_once 'coordenacao.php';
include_once 'banco.php';

if (isset($_POST['tipo'])) {
    $tipo = $_POST['tipo'];

    if ($tipo === 'cadastrarCoor') {
        cadastrarCoor();
    } else if ($tipo === 'login') {
        
        validarLogin(getCoordenadorLogin());
    }
}

function validarLogin($usuario)
{
    if (!isset($usuario)) {
    } else {
        if ($usuario->tipo === 'coordenador') {
            header('location:estagioC.php');
        } else if($usuario->tipo === 'orientador') {
            header('location: indexPROF.php');
        } else {
            header('location: cadastrarCoor.php');
        }
    }
}

function cadastrarCoor()
{

    $siape = $_POST['siape'];
    $nome = $_POST['nome'];
    $email  = $_POST['email'];
    $senha = $_POST['senha'];
    $id_curso = $_POST['id_curso'];
    $nivel = $_POST['nivel'];

    $coor = new Coordenacao($siape, $nome, $email, $senha, $id_curso, $nivel);

    $coor->inserirCoor();

    header("Location:cadastrarCoor.php");
}

function getCoor()
{
    try {

        $banco = new Banco();
        $conexao = $banco->conectar();
        $stmt = $conexao->prepare("SELECT * from coordenacao");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $coors = array();
        foreach ($stmt->fetchAll() as $v => $value) {
            $coor = new Coordenacao(
                $value['siape'],
                $value['nome'],
                $value['email'],
                $value['senha'],
                $value['id_curso'],
                $value['nivel']

            );
            $coor->siape = $value['siape'];
            array_push($coors, $coor);
        }

        return $coors;
    } catch (PDOException $ex) {
        echo 'Erro: ' . $ex->getMessage();
    }
}


function getCoordenadorLogin()
{

    $email  = $_POST['email'];
    $senha = $_POST['senha'];
    try {

        $banco = new Banco();
        $conexao = $banco->conectar();
        $stmt = $conexao->prepare("SELECT * from coordenacao WHERE email = :email AND senha = :senha");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $coors = array();
        foreach ($stmt->fetchAll() as $v => $value) {
            $coor = new Coordenacao(
                $value['siape'],
                $value['nome'],
                $value['email'],
                $value['senha'],
                $value['id_curso'],
                $value['nivel']

            );
            $coor->tipo = $value['nivel'];
            $coor->siape = $value['siape'];
            array_push($coors, $coor);
        }
        
        return $coors[0];
    } catch (PDOException $ex) {
        echo 'Erro: ' . $ex->getMessage();
    }
}
