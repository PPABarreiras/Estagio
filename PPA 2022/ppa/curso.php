<?php

include_once 'banco.php';

class Curso{

  public $nome;
  public $id_curso;


  function __construct($nome){

    $this->nome = $nome;
  }

  function setId($id_curso){

    $this->id_curso = $id_curso;
  }
}

?>