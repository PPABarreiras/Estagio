<?php
include_once 'encontros.php';
include_once 'banco.php';
include_once 'notasTCC.php';

if (isset($_POST['tipo'])) {
    $tipo = $_POST['tipo'];

    if ($tipo === 'cadastrarNotas_tcc') {
        cadastrarNotas_tcc();
    }
}

function cadastrarNotas_tcc()
{
    $matriculatcc = $_POST['matriculatcc'];
    $avaliador1 = $_POST['avaliador1'];
    $avaliador2 = $_POST['avaliador2'];
    $avaliador3 = $_POST['avaliador3'];
    $avaliador4 = $_POST['avaliador4'];
    $nota_final = $_POST['nota_final'];

    $notas_tcc = new Notas_tcc($matriculatcc, $avaliador1, $avaliador2, $avaliador3, $avaliador4, $nota_final);

    $notas_tcc->inserirNotas_tcc();

    header("Location:tcc_PROF_index.php");
}

function getNotas_tcc()
{
    try {

        $banco = new Banco();
        $conexao = $banco->conectar();
        $stmt = $conexao->prepare("SELECT * from notas_tcc");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $notas_tcc = array();
        foreach ($stmt->fetchAll() as $v => $value) {
            $notas_tcc = new Notas_tcc(
                $value['matricula'],
                $value['avaliador1'],
                $value['avaliador2'],
                $value['avaliador3'],
                $value['avaliador4'],
                $value['nota_final']

            );

            array_push($notas_tccs, $notas_tcc);
        }

        return $notas_tccs;
    } catch (PDOException $ex) {
        echo 'Erro: ' . $ex->getMessage();
    }
}
