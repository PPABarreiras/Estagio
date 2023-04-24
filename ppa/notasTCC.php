<?php

include_once 'banco.php';

class Notas_tcc{
  
    public $matriculatcc;
    public $avaliador1;
    public $avaliador2;
    public $avaliador3;
    public $avaliador4;
    public $nota_final;


  function __construct($matriculatcc, $avaliador1, $avaliador2, $avaliador3, $avaliador4, $nota_final){

    $this->matriculatcc = $matriculatcc;
    $this->avaliador1 = $avaliador1;
    $this->avaliador2 = $avaliador2;
    $this->avaliador3 = $avaliador3;
    $this->avaliador4 = $avaliador4;
    $this->nota_final = $nota_final;

  }

  function inserirNotas_tcc(){

    $banco = new Banco();
    $conexao = $banco->conectar();
    try {

        if ($this->avaliador4 != null) {
            $this->nota_final=(($this->avaliador1) + ($this->avaliador2) + ($this->avaliador3) + ($this->avaliador4))/4;
        } else {
            $this->nota_final=(($this->avaliador1) + ($this->avaliador2) + ($this->avaliador3))/3;
        }

        $stmt = $conexao->prepare("INSERT INTO notas_tcc(matriculatcc, avaliador1, avaliador2, avaliador3, avaliador4, nota_final) VALUES (:matriculatcc, :avaliador1, :avaliador2, :avaliador3, :avaliador4, :nota_final)");
        
        $stmt->bindParam(':matriculatcc', $this->matriculatcc);
        $stmt->bindParam(':avaliador1', $this->avaliador1);
        $stmt->bindParam(':avaliador2', $this->avaliador2);
        $stmt->bindParam(':avaliador3', $this->avaliador3);
        $stmt->bindParam(':avaliador4', $this->avaliador4);
        $stmt->bindParam(':nota_final', $this->nota_final);
        
        $stmt->execute();
    } catch (PDOException $ex) {
        echo "Erro ao inserir nota: " . $ex;
    }
  }

  static function carregarNotas_tcc($matriculatcc)
  {
    try {

      $banco = new Banco();
      $conexao = $banco->conectar();
      $stmt = $conexao->prepare("select * from notas_tcc WHERE matriculatcc = :matriculatcc");
      $stmt->bindParam(':matriculatcc', $matriculatcc);
      $stmt->execute();
      $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
      $notas_tcc = null;
      foreach ($stmt->fetchAll() as $v => $value) {
        $notas_tcc = new Notas_tcc(
           
          $value['matriculatcc'],
          $value['avaliador1'],
          $value['avaliador2'],
          $value['avaliador3'],
          $value['avaliador4'],
          $value['nota_final']
        );
        $notas_tcc->matriculatcc = $value['matriculatcc'];
      }

      return $notas_tcc;
    } catch (PDOException $ex) {
      echo 'Erro: ' . $ex->getMessage();
    }
  }
}