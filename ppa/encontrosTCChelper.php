<?php
include_once 'encontrosTCC.php';
include_once 'banco.php';

if (isset($_POST['tipo'])) {
    $tipo = $_POST['tipo'];

    if ($tipo === 'cadastrarEncontrosTCC') {
        cadastrarEncontrosTCC();
    }
}

function cadastrarEncontrosTCC()
{
    $matriculatcc = $_POST['matriculatcc'];
    $encontro1 = $_POST['encontro1'];
    $encontro2 = $_POST['encontro2'];
    $encontro3 = $_POST['encontro3'];

    $encontrosTCC = new EncontrosTCC($matriculatcc, $encontro1, $encontro2, $encontro3);

    $encontrosTCC->inserirEncontrosTCC();

    header("Location:tcc_PROF_index.php");
}

function getEncontrosTCC()
{
    try {

        $banco = new Banco();
        $conexao = $banco->conectar();
        $stmt = $conexao->prepare("SELECT * from encontrosTCC");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $encontrossTCC = array();
        foreach ($stmt->fetchAll() as $v => $value) {
            $encontrosTCC = new EncontrosTCC(
                $value['matriculatcc'],
                date($value['encontro1']),
                date($value['encontro2']),
                date($value['encontro3'])

            );

            array_push($encontrossTCC, $encontrosTCC);
        }

        return $encontrossTCC;
    } catch (PDOException $ex) {
        echo 'Erro: ' . $ex->getMessage();
    }
}
