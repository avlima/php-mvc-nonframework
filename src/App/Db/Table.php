<?php

namespace App\Db;


abstract class Table {

    protected $db;
    protected $table;

   //Recebemos no construtor da classe a conexão PDO
    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    //Métodos Get e Set
    public function setTable($table)
    {
        $this->table = $table;
        return $this;
    }

    public function getTable()
    {
        return $this->table;
    }




     /*FUNÇÕES DE BANDO DE DADOS*/

     public function fetchAll()
    {
        $stmt = $this->db->prepare("select * from conta_bancaria");
        $stmt->execute();
        return $stmt->fetchAll();
    }


      public function insert(array $data) {

        $stmt = $this->db->prepare(
            "INSERT INTO ".$this->getTable().
            "(tipo_conta, banco, agencia,conta,titular,status ) VALUES(:tipo_conta, :banco, :agencia,:conta,:titular,:status)"
        );
        $stmt->bindParam(":tipo_conta", $data['tipo_conta']);
        $stmt->bindParam(":banco", $data['banco']);
        $stmt->bindParam(":agencia", $data['agencia']);
         $stmt->bindParam(":conta", $data['conta']);
        $stmt->bindParam(":titular", $data['titular']);
        $stmt->bindParam(":status", $data['status']);

        $stmt->execute();
        return $this->db->lastInsertId();
    }

    public function findContaBancaria($id)
     {

        $stmt = $this->db->prepare("select * from conta_bancaria where id=:id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch();
    }

public function delete($id)
     {
        $stmt = $this->db->prepare("delete from ".$this->getTable()." where id=:id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return true;
    }

     public function update(array $data)
    {

        $stmt = $this->db->prepare("UPDATE ".$this->getTable()."
            SET tipo_conta=:tipo_conta, banco=:banco, agencia=:agencia,conta=:conta,
            titular=:titular,status=:status WHERE id=:id"
        );
        $stmt->bindParam(":id", $data['id']);
        $stmt->bindParam(":tipo_conta", $data['tipo_conta']);
         $stmt->bindParam(":banco", $data['banco']);
        $stmt->bindParam(":agencia", $data['agencia']);
        $stmt->bindParam(":conta", $data['conta']);
        $stmt->bindParam(":titular", $data['titular']);
        $stmt->bindParam(":status", $data['status']);
         $stmt->execute();

        return $data['id'];
    }

}