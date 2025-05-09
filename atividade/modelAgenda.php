<?php
    include_once "conexao.php";
    include_once "agenda.php";

    Class modelAgenda{ 

         public function create (Agenda $agenda){
            $sql = "insert into agenda (cpf, data, descricao) values (:cpf, :data, :descricao)";
            $con = new Conexao();
            $bd = $con->pegarConexao();
            $stmt = $bd->prepare($sql);
            $stmt->bindParam(":cpf", $agenda->getCpf());
            $stmt->bindParam(":data", $agenda->getData());
            $stmt->bindParam(":descricao", $agenda->getDescricao());
            $result = $stmt->exeute();
            if($result){
                 echo "agenda cadastrada com sucesso";
            }else{
                 echo "erro ao cadastrar agenda";
            }
        }  

public function deletar(Agenda $agenda){
        $sql = "delete from agenda where codigo = :codigo";
        $con = new Conexao();
        $bd = $con->pegarConexao();
        $stm=$bd->prepare($sql);
        $stm->bindValue(1,$agenda->getCodigo());
        $result = $stm->execute();
        if($result)
        {
            echo "deletado com sucesso";
        }else{
            echo"erro ao deletar";
        }
    }

    public function atualizar(Agenda $agenda){
        $sql = "updateagenda set cpf = ?, data = ?, descricao = ? where cpf = ?";
        $con = new Conexao();
        $bd = $con->pegarConexao();

        $stm = $bd->prepare($sql);
       
        $stm->bindValue(1, $agenda->getCpf());
        $stm->bindValue(2, $agenda->getData());
        $stm->bindValue(3, $agenda->getDescricao());
        $result = $stm->execute();
        if($result){
            echo "atualizado com sucesso";
        }else{
            echo "erro ao atualizar";
        }
    }

    public function consultar(){
        $sql = "select * from agenda";
        $con = new Conexao();
        $bd = $con->pegarConexao();

        $stm = $bd->prepare($sql);
        $stm->execute();
        if($stm->rowCount()>0){
            $resultado = $stm->fetchAll(PDO::FETCH_ASSOC);
            return json_encode($resultado);
        }
    }
}

?>