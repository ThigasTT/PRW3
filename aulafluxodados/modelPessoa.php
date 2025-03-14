<?php
include "conexao.php";
//DAO(Crud) create, read, update, delete
class ModelPessoa{
    public function inserir(Pessoa $pessoa){
        $sql = "insert into pessoa(cpf, nome, contato) values (?,?,?)";
        $con = new Conexao();
        $bd = $con->pegarConexao();
        $stm=$con->prepare($sql);
        $stm->bindValue(1,$pessoa->getCpf());
        $stm->bindValue(2,$pessoa->getNome());
        $stm->bindValue(3,$pessoa->getContato());
    }
}
?>
