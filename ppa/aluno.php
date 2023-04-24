<?php

include_once 'banco.php';

class Aluno
{
  public $matricula;
  public $nome;
  public $turma;
  public $email;
  public $telefone;
  public $orientador;
  public $setor;
  public $empresa;
  public $remunerado;
  public $id_curso;
  public $documento;


  function __construct($matricula, $nome, $turma, $email, $telefone, $orientador, $setor, $empresa, $remunerado, $id_curso)
  {
    $this->matricula = $matricula;
    $this->nome = $nome;
    $this->turma = $turma;
    $this->email = $email;
    $this->telefone = $telefone;
    $this->orientador = $orientador;
    $this->setor = $setor;
    $this->empresa = $empresa;
    $this->remunerado = $remunerado;
    $this->id_curso = $id_curso;
  }


  function salvar()
  {

    $banco = new Banco();
    $conexao = $banco->conectar();
    try {
      $stmt = $conexao->prepare("UPDATE  aluno SET  documento = :documento  WHERE matricula = :matricula" );
      
      $stmt->bindParam(':documento', $this->documento);
       
      $stmt->bindParam(':matricula', $this->matricula);

      $stmt->execute();
    } catch (PDOException $ex) {
      echo "Erro ao inserir aluno: " . $ex;
    }
   }
  





  function inserir()
  {

    $banco = new Banco();
    $conexao = $banco->conectar();
    try {
      $stmt = $conexao->prepare("insert into aluno(matricula, nome, turma, email, telefone, orientador, setor, empresa, remunerado, id_curso) values (:matricula, :nome, :turma, :email, :telefone, :orientador, :setor, :empresa, :remunerado, :id_curso)");
      
      $stmt->bindParam(':matricula', $this->matricula);
      $stmt->bindParam(':nome', $this->nome);
      $stmt->bindParam(':turma', $this->turma);
      $stmt->bindParam(':email', $this->email);
      $stmt->bindParam(':telefone', $this->telefone);
      $stmt->bindParam(':orientador', $this->orientador);
      $stmt->bindParam(':setor', $this->setor);
      $stmt->bindParam(':empresa', $this->empresa);
      $stmt->bindParam(':remunerado', $this->remunerado);
      $stmt->bindParam(':id_curso', $this->id_curso);

      $stmt->execute();
    } catch (PDOException $ex) {
      echo "Erro ao inserir aluno: " . $ex;
    }
  }

  
  function editar()
  {
    $banco = new Banco();
    $conexao = $banco->conectar();
    try {
      $stmt = $conexao->prepare("UPDATE  aluno SET matricula = :matricula, nome = :nome, turma = :turma, email = :email, telefone = :telefone, orientador = :orientador, setor = :setor, empresa = :empresa, remunerado = :remunerado, id_curso = :id_curso WHERE matricula = :matricula;");

      $stmt->bindParam(':matricula', $this->matricula);
      $stmt->bindParam(':nome', $this->nome);
      $stmt->bindParam(':turma', $this->turma);
      $stmt->bindParam(':email', $this->email);
      $stmt->bindParam(':telefone', $this->telefone);
      $stmt->bindParam(':matricula', $this->matricula);
      $stmt->bindParam(':orientador', $this->orientador);
      $stmt->bindParam(':setor', $this->setor);
      $stmt->bindParam(':empresa', $this->empresa);
      $stmt->bindParam(':remunerado', $this->remunerado);
      $stmt->bindParam(':id_curso', $this->id_curso);
      $stmt->execute();
    } catch (PDOException $ex) {
      echo "Erro ao inserir aluno: " . $ex;
    }
  }

  function visualizar()
  {
    $banco = new Banco();
    $conexao = $banco->conectar();
    try {
      $stmt = $conexao->prepare("UPDATE  aluno SET matricula = :matricula, nome = :nome, turma = :turma, email = :email, telefone = :telefone, orientador = :orientador, setor = :setor, empresa = :empresa, remunerado = :remunerado, id_curso = :id_curso  WHERE matricula = :matricula;");

      $stmt->bindParam(':matricula', $this->matricula);
      $stmt->bindParam(':nome', $this->nome);
      $stmt->bindParam(':turma', $this->turma);
      $stmt->bindParam(':email', $this->email);
      $stmt->bindParam(':telefone', $this->telefone);
      $stmt->bindParam(':matricula', $this->matricula);
      $stmt->bindParam(':orientador', $this->orientador);
      $stmt->bindParam(':setor', $this->setor);
      $stmt->bindParam(':empresa', $this->empresa);
      $stmt->bindParam(':remunerado', $this->remunerado);
      $stmt->bindParam(':id_curso', $this->id_curso);
      $stmt->execute();
    } catch (PDOException $ex) {
      echo "Erro ao inserir aluno: " . $ex;
    }
  }

  function encontros()
  {
    $banco = new Banco();
    $conexao = $banco->conectar();
    try {
      $stmt = $conexao->prepare("UPDATE  aluno SET  nome = :nome, turma = :turma, setor = :setor, empresa = :empresa, id_curso = :id_curso WHERE matricula = :matricula;");
   
      $stmt->bindParam(':nome', $this->nome);
      $stmt->bindParam(':turma', $this->turma);
      $stmt->bindParam(':setor', $this->setor);
      $stmt->bindParam(':empresa', $this->empresa);
      $stmt->bindParam(':id_curso', $this->id_curso);
    } catch (PDOException $ex) {
      echo "Erro ao inserir aluno: " . $ex;
    }
  }
  



  static function carregar($matricula)
  {
    try {

      $banco = new Banco();
      $conexao = $banco->conectar();
      $stmt = $conexao->prepare("select * from aluno WHERE matricula = :matricula");
      $stmt->bindParam(':matricula', $matricula);
      $stmt->execute();
      $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
      $aluno = null;
      foreach ($stmt->fetchAll() as $v => $value) {
        $aluno = new Aluno(
           
          $value['matricula'],
          $value['nome'],
          $value['turma'],
          $value['email'],
          $value['telefone'],
          $value['orientador'],
          $value['setor'],
          $value['empresa'],
          $value['remunerado'],
          $value['id_curso']
        );
        $aluno->matricula = $value['matricula'];
      }

      return $aluno;
    } catch (PDOException $ex) {
      echo 'Erro: ' . $ex->getMessage();
    }
  }
}