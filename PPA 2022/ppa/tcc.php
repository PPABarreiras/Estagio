<?php

include_once 'banco.php';

class Alunotcc
{
  public $matriculatcc;
  public $nome;
  public $telefone;
  public $email;
  public $turma;
  public $tema;
  public $orientador;
  public $datainicio;
  public $datadefesa;
  public $dataconclusao;
  public $previsaotermino;
  public $id_curso;
  public $documento;


  function __construct ($matriculatcc, $nome, $telefone, $email, $turma,  $tema, $orientador, $datainicio, $datadefesa, $dataconclusao, $previsaotermino, $id_curso)
  {
    $this->matriculatcc = $matriculatcc;
    $this->nome = $nome;
    $this->telefone = $telefone;
    $this->email = $email;
    $this->turma = $turma;
    $this->tema = $tema;
    $this->orientador = $orientador;
    $this->datainicio = new DateTime ($datainicio);
    $this->datadefesa = new DateTime ($datadefesa);
    $this->dataconclusao = new DateTime ($dataconclusao);
    $this->previsaotermino = new DateTime ($previsaotermino);
    $this->id_curso = $id_curso;
  }


  function salvar()
  {

    $banco = new Banco();
    $conexao = $banco->conectar();
    try {
      $stmt = $conexao->prepare("UPDATE  alunotcc SET  documento = :documento  WHERE matriculatcc = :matriculatcc" );
      
      $stmt->bindParam(':documento', $this->documento);
       
      $stmt->bindParam(':matriculatcc', $this->matriculatcc);

      $stmt->execute();
    } catch (PDOException $ex) {
      echo "Erro ao inserir aluno: " . $ex;
    }
   }
  function inserirDados()
  {

    $banco = new Banco();
    $conexao = $banco->conectar();
    try {
      $stmt = $conexao->prepare("insert into alunotcc (matriculatcc, nome, telefone, email, turma, tema, orientador, datainicio, datadefesa, dataconclusao, previsaotermino, id_curso) values (:matriculatcc, :nome, :telefone, :email, :turma, :orientador, :tema, :datainicio, :datadefesa, :dataconclusao, :previsaotermino, :id_curso)");
      
      $stmt->bindParam(':matriculatcc', $this->matriculatcc);
      $stmt->bindParam(':nome', $this->nome);
      $stmt->bindParam(':telefone', $this->telefone);
      $stmt->bindParam(':email', $this->email);
      $stmt->bindParam(':turma', $this->turma);
      $stmt->bindParam(':tema', $this->tema);
      $stmt->bindParam(':orientador', $this->orientador);

      $stmt->bindParam(':datainicio', $this->datainicio->format('Y/m/d'));
      $stmt->bindParam(':datadefesa', $this->datadefesa->format('Y/m/d'));
      $stmt->bindParam(':dataconclusao', $this->dataconclusao->format('Y/m/d'));
      $stmt->bindParam(':previsaotermino', $this->previsaotermino->format('Y/m/d'));
      $stmt->bindParam(':id_curso', $this->id_curso);

      $stmt->execute();
    } catch (PDOException $ex) {
      echo "Erro ao inserir aluno: " . $ex;
    }
  }

  
  function editarDados()
  {
    $banco = new Banco();
    $conexao = $banco->conectar();
    try {
      $stmt = $conexao->prepare("UPDATE  alunotcc SET matriculatcc = :matriculatcc, nome = :nome, telefone = :telefone, email = :email, turma = :turma, tema = :tema, orientador = :orientador,  datainicio = :datainicio, datadefesa = :datadefesa, dataconclusao = :dataconclusao, previsaotermino = :previsaotermino, id_curso = :id_curso  WHERE matriculatcc = :matriculatcc;");

      $stmt->bindParam(':matriculatcc', $this->matriculatcc);
      $stmt->bindParam(':nome', $this->nome);
      $stmt->bindParam(':telefone', $this->telefone);
      $stmt->bindParam(':email', $this->email);
      $stmt->bindParam(':turma', $this->turma);
      $stmt->bindParam(':tema', $this->tema);
      $stmt->bindParam(':orientador', $this->orientador);
    
      $stmt->bindParam(':datainicio', $this->datainicio->format('Y/m/d'));
      $stmt->bindParam(':datadefesa', $this->datadefesa->format('Y/m/d'));
      $stmt->bindParam(':dataconclusao', $this->dataconclusao->format('Y/m/d'));
      $stmt->bindParam(':previsaotermino', $this->previsaotermino->format('Y/m/d'));
      $stmt->bindParam(':id_curso', $this->id_curso);
      $stmt->execute();
    } catch (PDOException $ex) {
      echo "Erro ao inserir aluno: " . $ex;
    }
  }

  function visualizarDados()
  {
    $banco = new Banco();
    $conexao = $banco->conectar();
    try {
      $stmt = $conexao->prepare("UPDATE  alunotcc SET matriculatcc = :matriculatcc, nome = :nome, telefone = :telefone, email = :email, turma = :turma, tema = :tema, orientador = :orientador, datainicio = :datainicio, datadefesa = :datadefesa, dataconclusao = :dataconclusao, previsaotermino = :previsaotermino, id_curso = :id_curso  WHERE matriculatcc = :matriculatcc;");

      $stmt->bindParam(':matriculatcc', $this->matriculatcc);
      $stmt->bindParam(':nome', $this->nome);
      $stmt->bindParam(':telefone', $this->telefone);
      $stmt->bindParam(':email', $this->email);
      $stmt->bindParam(':turma', $this->turma);
      $stmt->bindParam(':tema', $this->tema);
      $stmt->bindParam(':orientador', $this->orientador);
      
      $stmt->bindParam(':datainicio', $this->datainicio->format('Y/m/d'));
      $stmt->bindParam(':datadefesa', $this->datadefesa->format('Y/m/d'));
      $stmt->bindParam(':dataconclusao', $this->dataconclusao->format('Y/m/d'));
      $stmt->bindParam(':previsaotermino', $this->previsaotermino->format('Y/m/d'));
      $stmt->bindParam(':id_curso', $this->id_curso);
      $stmt->execute();
    } catch (PDOException $ex) {
      echo "Erro ao inserir aluno: " . $ex;
    }
  }



  static function carregar($matriculatcc)
  {
    try {

      $banco = new Banco();
      $conexao = $banco->conectar();
      $stmt = $conexao->prepare("select * from alunotcc WHERE matriculatcc = :matriculatcc");
      $stmt->bindParam(':matriculatcc', $matriculatcc);
      $stmt->execute();
      $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
      $alunotcc = null;
      foreach ($stmt->fetchAll() as $v => $value) {
        $alunotcc = new Alunotcc(
           
          $value['matriculatcc'],
          $value['nome'],
          $value['telefone'],
          $value['email'],
          $value['turma'],
          $value['tema'],
          $value['orientador'],
          
          date($value['datainicio']),
          date($value['datadefesa']),
          date($value['dataconclusao']),
          date($value['previsaotermino']),
          $value['id_curso']
        );
        $alunotcc->matriculatcc = $value['matriculatcc'];
      }

      return $alunotcc;
    } catch (PDOException $ex) {
      echo 'Erro: ' . $ex->getMessage();
    }
  }
}