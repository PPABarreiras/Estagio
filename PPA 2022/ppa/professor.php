<?php

include_once 'banco.php';

class Professor{
  
  public $siape;
  public $nome;
  public $email;
  public $senha;
  public $id_curso;
  //public $confimeSenha;

  function __construct($siape, $nome, $email, $senha, $id_curso/*, $confirmeSenha*/){
      
    $this->siape = $siape;
    $this->nome = $nome;
    $this->email = $email;
    $this->senha = $senha;
    $this->id_curso = $id_curso;
    //$this->confirmeSenha = $confirmeSenha;
  }

  function inserirPROF(){

  $banco = new Banco();
  $conexao = $banco->conectar();
  try {

    $stmt = $conexao->prepare("INSERT INTO professor(siape, nome, email, senha, id_curso) VALUES (:siape, :nome, :email, :senha, :id_curso)");
    
    $stmt->bindParam(':siape', $this->siape);
    $stmt->bindParam(':nome', $this->nome);
    $stmt->bindParam(':email', $this->email);
    $stmt->bindParam(':senha', $this->senha);
    $stmt->bindParam(':id_curso', $this->id_curso);
    
    $stmt->execute();
  } catch (PDOException $ex) {
    echo "Erro ao inserir coordenador: " . $ex;
  }
  }
}