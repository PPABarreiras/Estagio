<?php
include_once 'encontros.php';
include_once 'banco.php';
include_once 'notas_estagio.php';

if (isset($_POST['tipo'])) {
    $tipo = $_POST['tipo'];

    if ($tipo === 'cadastrarNotas_estagio') {
        cadastrarNotas_estagio();
    }
}

function cadastrarNotas_estagio()
{
    $matricula = $_POST['matricula'];
    $nota_relatorio = $_POST['nota_relatorio'];
    $nota_orientador = $_POST['nota_orientador'];
    $nota_empresa = $_POST['nota_empresa'];
    $nota_aluno = $_POST['nota_aluno'];
    $nota_final = $_POST['nota_final'];

    $notas_estagio = new Notas_estagio($matricula, $nota_relatorio, $nota_orientador, $nota_empresa, $nota_aluno, $nota_final);

    $notas_estagio->inserirNotas_estagio();

    header("Location:indexPROF.php");
}

function getNotas_estagio()
{
    try {

        $banco = new Banco();
        $conexao = $banco->conectar();
        $stmt = $conexao->prepare("SELECT * from notas_estagio");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $notas_estagios = array();
        foreach ($stmt->fetchAll() as $v => $value) {
            $notas_estagio = new Notas_estagio(
                $value['matricula'],
                $value['nota_relatorio'],
                $value['nota_orientador'],
                $value['nota_empresa'],
                $value['nota_aluno'],
                $value['nota_final']

            );

            array_push($notas_estagios, $notas_estagio);
        }

        return $notas_estagios;
    } catch (PDOException $ex) {
        echo 'Erro: ' . $ex->getMessage();
    }
}
