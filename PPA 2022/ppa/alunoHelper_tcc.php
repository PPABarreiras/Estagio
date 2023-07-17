<?php
        include_once 'tcc.php';
        //include_once 'aluno.php';
        include_once 'banco.php';

        if (isset($_POST['tipo'])) {
        $tipo = $_POST['tipo'];
        
        if ($tipo === 'cadastrar') {
            cadastrarAlunotcc();
        }else if($tipo ==="editarDados"){
            editar_alunotcc();
        } else if($tipo === "visualizarDados"){
            visualizar_Alunotcc();
        } else if ($tipo === "encontros") {
            encontros_Aluno();
        }else if($tipo === "anexarDados"){
            fazerUploads();
        }
        }


        function editar_alunotcc(){

            $matriculatcc = $_POST['matriculatcc'];
            $nome = $_POST['nome'];
            $telefone  = $_POST['telefone'];
            $email = $_POST['email'];
            $turma = $_POST['turma'];
            $tema  = $_POST['tema'];
            $orientador  = $_POST['orientador'];
            $datainicio  = $_POST['datainicio'];
            $datadefesa  = $_POST['datadefesa'];
            $dataconclusao  = $_POST['dataconclusao'];
            $previsaotermino  = $_POST['previsaotermino'];
            $id_curso = $_POST['id_curso'];

            $alunotcc = new Alunotcc($matriculatcc, $nome, $telefone, $email, $turma, $tema, $orientador, $datainicio, $datadefesa, $dataconclusao, $previsaotermino, $id_curso);
            $alunotcc->matriculatcc = $matriculatcc;
            
            $alunotcc->editarDados();
            header("Location:tcc_coord_index.php");
        }
        function visualizar_Alunotcc(){

            $matriculatcc = $_POST['matriculatcc'];
            $nome = $_POST['nome'];
            $telefone  = $_POST['telefone'];
            $email = $_POST['email'];
            $turma = $_POST['turma'];         
            $tema  = $_POST['tema'];
            $orientador  = $_POST['orientador'];
            $datainicio  = $_POST['datainicio'];
            $datadefesa  = $_POST['datadefesa'];
            $dataconclusao  = $_POST['dataconclusao'];
            $previsaotermino  = $_POST['previsaotermino'];
            $id_curso = $_POST['id_curso'];


            $alunotcc = new Alunotcc($matriculatcc, $nome, $telefone, $email, $turma,  $tema, $orientador, $datainicio, $datadefesa, $dataconclusao, $previsaotermino, $id_curso);
            $alunotcc->matriculatcc = $matriculatcc;
            
            $alunotcc->visualizarDados();
            fazerUpload($alunotcc);
            header("Location:tcc_encontros_PROF.php");
        }

/* function encontros_Aluno()
{

    $matricula = $_POST['matricula'];
    $nome = $_POST['nome'];
    $turma = $_POST['turma'];
    $email = $_POST['email'];
    $telefone  = $_POST['telefone'];
    $orientador  = $_POST['orientador'];
    $setor  = $_POST['setor'];
    $empresa  = $_POST['empresa'];
    $remunerado  = $_POST['remunerado'];
    $id_curso = $_POST['id_curso'];
    $aluno = new Aluno($matricula, $nome, $turma, $email, $telefone, $orientador, $setor, $empresa, $remunerado, $id_curso);

    $aluno->encontros();

    header("Location:notasPROF.php");
}*/
     
    function cadastrarAlunotcc()
    {
        $matriculatcc = $_POST['matriculatcc'];
        $nome = $_POST['nome'];
        $telefone  = $_POST['telefone'];
        $email = $_POST['email'];
        $turma = $_POST['turma'];
        $tema  = $_POST['tema'];
        $orientador  = $_POST['orientador'];
        $datainicio  = $_POST['datainicio'];
        $datadefesa  = $_POST['datadefesa'];
        $dataconclusao  = $_POST['dataconclusao'];
        $previsaotermino  = $_POST['previsaotermino'];
        $id_curso = $_POST['id_curso'];

        $alunotcc = new Alunotcc($matriculatcc, $nome, $telefone, $email, $turma, $tema, $orientador, $datainicio, $datadefesa, $dataconclusao, $previsaotermino, $id_curso);
      
        $alunotcc->inserirDados();
        var_dump($alunotcc);
       header("Location:tcc_coord_index.php");
    }


    function fazerUploads()
{
    $matriculatcc = $_POST['matriculatcc'];
    $alunotcc = Alunotcc::carregar($matriculatcc);

    $dir = "uploadstcc/";


    mkdir("uploadstcc/" . $alunotcc->matriculatcc);

    $dir = "uploadstcc/" . $alunotcc->matriculatcc . "/";

    $arquivo = $dir . basename($_FILES["fname"]["name"]);
   
    $uploadtccOK = 1;
    $tipo = strtolower(pathinfo($arquivo, PATHINFO_EXTENSION));

    
    if ($tipo != "pdf") {
        $uploadtccOK = 0;
    }

    if ($_FILES["fname"]["size"] > 5000000) {
        $uploadtccOK = 0;
    }

    if ($uploadtccOK == 0) {
        echo "Não foi possível fazer o download";
    } else {
        if (move_uploaded_file($_FILES["fname"]["tmp_name"],  $arquivo)) {
            $alunotcc->documento = $arquivo;
            $alunotcc->salvar();
        } else {
            echo "Erro ao fazer upload do arquivo";
        }
    }
    header('location:tcc_coord_index.php');
}

        function getAlunotcc()
        {
            try {

                $banco = new Banco();
                $conexao = $banco->conectar();
                $stmt = $conexao->prepare("select * from alunotcc");
                $stmt->execute();
                $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $alunostcc = array();
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
                    $alunotcc->documento = $value['documento'];
                    array_push($alunostcc, $alunotcc);
                }

                return $alunostcc;
            } catch (PDOException $ex) {
                echo 'Erro: ' . $ex->getMessage();
            }
        
        
        }  
        
        
?>