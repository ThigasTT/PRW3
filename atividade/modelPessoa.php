<?php
    include "conexao.php";    
    //DAO - CRUD - create, read, update, delete
    class ModelPessoa{
        public function inserir(Pessoa $pessoa){
            $sql = "insert into pessoa(cpf, nome, contato) 
            values(?, ?, ?)";
            $con = new Conexao();
            $bd = $con->pegarConexao();

            $stm = $bd->prepare($sql);
            $stm->bindValue(1, $pessoa->getCpf());
            $stm->bindValue(2, $pessoa->getNome());
            $stm->bindValue(3, $pessoa->getContato());
            $result = $stm->execute();
            if($result){
                echo "cadastrado com sucesso";
            }else{
                echo "erro ao cadastrar";
            }
        }
        

    public function deletar(Pessoa $pessoa){
        $sql = "delete from pessoa where cpf = ?";
        $con = new Conexao();
        $bd = $con->pegarConexao();
        $stm=$bd->prepare($sql);
        $stm->bindValue(1,$pessoa->getCpf());
        $result = $stm->execute();
        if($result)
        {
            echo "deletado com sucesso";
        }else{
            echo"erro ao deletar";
        }
    }

    public function atualizar(Pessoa $pessoa){
        $sql = "update pessoa set nome = ?, contato = ? where cpf = ?";
        $con = new Conexao();
        $bd = $con->pegarConexao();

        $stm = $bd->prepare($sql);
       
        $stm->bindValue(1, $pessoa->getNome());
        $stm->bindValue(2, $pessoa->getContato());
        $stm->bindValue(3, $pessoa->getCpf());
        $result = $stm->execute();
        if($result){
            echo "atualizado com sucesso";
        }else{
            echo "erro ao atualizar";
        }
    }

    public function consultar(){
        $sql = "select * from pessoa";
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