<?php
include_once 'professor.php';
include_once 'banco.php';

if (isset($_POST['tipo'])) {
    $tipo = $_POST['tipo'];

       if ($tipo === 'cadastrarPROF') {
        cadastrarPROF();
    } 
}

function cadastrarPROF(){

    $siape = $_POST['siape'];
    $nome = $_POST['nome'];
    $email  = $_POST['email'];
    $senha = $_POST['senha'];
    $id_curso = $_POST['id_curso'];
    //$confirmeSenha = $_POST['confirmeSenha'];

    $prof = new Professor($siape, $nome, $email, $senha, $id_curso/*, $confirmeSenha*/);

    $prof->inserirPROF();

    header("Location:cadastroADM.php");
}

function getPROF(){
    try {

        $banco = new Banco();
        $conexao = $banco->conectar();
        $stmt = $conexao->prepare("SELECT * from professor");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $profs = array();
        foreach ($stmt->fetchAll() as $v => $value) {
            $prof = new Professor(
                $value['siape'],
                $value['nome'],
                $value['email'],
                $value['senha'],
                $value['id_curso'],
               
            );
            $prof->siape = $value['siape'];
            array_push($profs, $prof);
        }

        return $profs;
    } catch (PDOException $ex) {
        echo 'Erro: ' . $ex->getMessage();
    }
}