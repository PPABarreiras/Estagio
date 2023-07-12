<?php

include_once 'banco.php';
include_once 'curso.php';

function getCursos(){

    try {

        $banco = new Banco();
        $conexao = $banco->conectar();
        $stmt = $conexao->prepare("select * from curso");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $cursos = array();

        foreach ($stmt->fetchAll() as $v => $value){

            $curso = new Curso($value['nome']);
            $curso->id_curso = $value['id_curso'];
            array_push($cursos, $curso);
        }

        return $cursos;
    } catch (PDOException $ex) {
        echo 'Erro: ' . $ex->getMessage();
    }
}

?>