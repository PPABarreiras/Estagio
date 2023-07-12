<?php

include_once 'banco.php';

class Notas_estagio{
  
    public $matricula;
    public $nota_relatorio;
    public $nota_orientador;
    public $nota_empresa;
    public $nota_aluno;
    public $nota_final;

  function __construct($matricula, $nota_relatorio, $nota_orientador, $nota_empresa, $nota_aluno, $nota_final){

    $this->matricula = $matricula;
    $this->nota_relatorio = $nota_relatorio;
    $this->nota_orientador = $nota_orientador;
    $this->nota_empresa = $nota_empresa;
    $this->nota_aluno = $nota_aluno;
    $this->nota_final = (($nota_relatorio*0.3) + ($nota_orientador*0.2) + ($nota_empresa*0.4) + ($nota_aluno*0.1))/1;
  }

  function inserirNotas_estagio(){

    $banco = new Banco();
    $conexao = $banco->conectar();
    try {

        $stmt = $conexao->prepare("INSERT INTO notas_estagio(matricula, nota_relatorio, nota_orientador, nota_empresa, nota_aluno, nota_final) VALUES (:matricula, :nota_relatorio, :nota_orientador, :nota_empresa, :nota_aluno, :nota_final)");
        
        $stmt->bindParam(':matricula', $this->matricula);
        $stmt->bindParam(':nota_relatorio', $this->nota_relatorio);
        $stmt->bindParam(':nota_orientador', $this->nota_orientador);
        $stmt->bindParam(':nota_empresa', $this->nota_empresa);
        $stmt->bindParam(':nota_aluno', $this->nota_aluno);
        $stmt->bindParam(':nota_final', $this->nota_final);
        
        $stmt->execute();
    } catch (PDOException $ex) {
        echo "Erro ao inserir nota: " . $ex;
    }
  }

  static function carregarNotas_estagio($matricula)
  {
    try {

      $banco = new Banco();
      $conexao = $banco->conectar();
      $stmt = $conexao->prepare("select * from notas_estagio WHERE matricula = :matricula");
      $stmt->bindParam(':matricula', $matricula);
      $stmt->execute();
      $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
      $notas_estagio = null;
      foreach ($stmt->fetchAll() as $v => $value) {
        $notas_estagio = new Notas_estagio(
           
          $value['matricula'],
          $value['nota_relatorio'],
          $value['nota_orientador'],
          $value['nota_empresa'],
          $value['nota_aluno'],
          $value['nota_final']
        );
        $notas_estagio->matricula = $value['matricula'];
      }

      return $notas_estagio;
    } catch (PDOException $ex) {
      echo 'Erro: ' . $ex->getMessage();
    }
  }
}