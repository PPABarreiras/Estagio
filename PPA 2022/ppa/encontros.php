<?php

include_once 'banco.php';

class Encontros{
  
    public $matricula;
    public $encontro1;
    public $encontro2;
    public $encontro3;

  function __construct( $matricula, $encontro1, $encontro2, $encontro3){
    $this->matricula = $matricula;
    $this->encontro1 = new DateTime($encontro1);
    $this->encontro2 = new DateTime($encontro2);
    $this->encontro3 = new DateTime($encontro3);
  }

  function inserirEncontros(){

    $banco = new Banco();
    $conexao = $banco->conectar();
    try {

        $stmt = $conexao->prepare("INSERT INTO encontros(matricula, encontro1, encontro2, encontro3) VALUES (:matricula, :encontro1, :encontro2, :encontro3)");
        
        $stmt->bindParam(':matricula', $this->matricula);
        $stmt->bindParam(':encontro1', $this->encontro1->format('Y/m/d'));
        $stmt->bindParam(':encontro2', $this->encontro2->format('Y/m/d'));
        $stmt->bindParam(':encontro3', $this->encontro3->format('Y/m/d'));
        
        $stmt->execute();
    } catch (PDOException $ex) {
        echo "Erro ao inserir: " . $ex;
    }
  }

  static function carregarEncontros($matricula)
  {
    try {

      $banco = new Banco();
      $conexao = $banco->conectar();
      $stmt = $conexao->prepare("select * from encontros WHERE matricula = :matricula");
      $stmt->bindParam(':matricula', $matricula);
      $stmt->execute();
      $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
      $encontros = null;
      foreach ($stmt->fetchAll() as $v => $value) {
        $encontros = new Encontros(
           
          $value['matricula'],
          date($value['encontro1']),
          date($value['encontro2']),
          date($value['encontro3'])
        );
        $encontros->matricula = $value['matricula'];
      }

      return $encontros;
    } catch (PDOException $ex) {
      echo 'Erro: ' . $ex->getMessage();
    }
  }
}