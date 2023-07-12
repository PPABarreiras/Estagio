<?php
include_once 'encontros.php';
include_once 'banco.php';

if (isset($_POST['tipo'])) {
    $tipo = $_POST['tipo'];

    if ($tipo === 'cadastrarEncontros') {
        cadastrarEncontros();
    }
}

function cadastrarEncontros()
{
    $matricula = $_POST['matricula'];
    $encontro1 = $_POST['encontro1'];
    $encontro2 = $_POST['encontro2'];
    $encontro3 = $_POST['encontro3'];

    $encontros = new Encontros($matricula, $encontro1, $encontro2, $encontro3);

    $encontros->inserirEncontros();

    header("Location:indexPROF.php");
}

function getEncontros()
{
    try {

        $banco = new Banco();
        $conexao = $banco->conectar();
        $stmt = $conexao->prepare("SELECT * from encontros");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $encontross = array();
        foreach ($stmt->fetchAll() as $v => $value) {
            $encontros = new Encontros(
                $value['matricula'],
                date($value['encontro1']),
                date($value['encontro2']),
                date($value['encontro3'])

            );

            array_push($encontross, $encontros);
        }

        return $encontross;
    } catch (PDOException $ex) {
        echo 'Erro: ' . $ex->getMessage();
    }
}
