<?php

include_once 'banco.php';

class EncontrosTCC{
  
    public $matriculatcc;
    public $encontro1;
    public $encontro2;
    public $encontro3;

  function __construct( $matriculatcc, $encontro1, $encontro2, $encontro3){
    $this->matriculatcc = $matriculatcc;
    $this->encontro1 = new DateTime($encontro1);
    $this->encontro2 = new DateTime($encontro2);
    $this->encontro3 = new DateTime($encontro3);
  }

  function inserirEncontrosTCC(){

    $banco = new Banco();
    $conexao = $banco->conectar();
    try {

        $stmt = $conexao->prepare("INSERT INTO encontrosTCC(matriculatcc, encontro1, encontro2, encontro3) VALUES (:matriculatcc, :encontro1, :encontro2, :encontro3)");
        
        $stmt->bindParam(':matriculatcc', $this->matriculatcc);
        $stmt->bindParam(':encontro1', $this->encontro1->format('Y/m/d'));
        $stmt->bindParam(':encontro2', $this->encontro2->format('Y/m/d'));
        $stmt->bindParam(':encontro3', $this->encontro3->format('Y/m/d'));
        
        $stmt->execute();
    } catch (PDOException $ex) {
        echo "Erro ao inserir encontro: " . $ex;
    }
  }

  static function carregarEncontrosTCC($matriculatcc)
  {
    try {

      $banco = new Banco();
      $conexao = $banco->conectar();
      $stmt = $conexao->prepare("select * from encontrosTCC WHERE matriculatcc = :matriculatcc");
      $stmt->bindParam(':matriculatcc', $matriculatcc);
      $stmt->execute();
      $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
      $encontrosTCC = null;
      foreach ($stmt->fetchAll() as $v => $value) {
        $encontrosTCC = new EncontrosTCC(
           
          $value['matriculatcc'],
          date($value['encontro1']),
          date($value['encontro2']),
          date($value['encontro3'])
        );
        $encontrosTCC->matriculatcc = $value['matriculatcc'];
      }

      return $encontrosTCC;
    } catch (PDOException $ex) {
      echo 'Erro: ' . $ex->getMessage();
    }
  }
}