<?php

include_once 'banco.php';

class Coordenacao{
  
  public $siape;
  public $nome;
  public $email;
  public $senha;
  public $id_curso;
  public $nivel;

  function __construct($siape, $nome, $email, $senha, $id_curso, $nivel){
      
    $this->siape = $siape;
    $this->nome = $nome;
    $this->email = $email;
    $this->senha = $senha;
    $this->id_curso = $id_curso;
    $this->nivel = $nivel;
  }

  function inserirCoor(){

  $banco = new Banco();
  $conexao = $banco->conectar();
  try {

    $stmt = $conexao->prepare("INSERT INTO coordenacao(siape, nome, email, senha, id_curso, nivel) VALUES (:siape, :nome, :email, :senha, :id_curso, :nivel)");
    
    $stmt->bindParam(':siape', $this->siape);
    $stmt->bindParam(':nome', $this->nome);
    $stmt->bindParam(':email', $this->email);
    $stmt->bindParam(':senha', $this->senha);
    $stmt->bindParam(':id_curso', $this->id_curso);
    $stmt->bindParam(':nivel', $this->nivel);
    
    $stmt->execute();
  } catch (PDOException $ex) {
    echo "Erro ao inserir usuario: " . $ex;
  }
  }
}