<?php

namespace Classes;

class Database extends \PDO{

    # construindo a conexão assim que o objeto é instanciado
    public function __construct($sgdb, $host, $dbname, $user, $password)
    {
        try {
            
            $dns = sprintf("%s:host=%s;dbname=%s", $sgdb, $host, $dbname);
            parent::__construct($dns, $user, $password);

        } catch(\PDOExepction $e){
            echo $e->getCode() . "<br><br>";
            echo "<h1>Erro: </h1>" . $e->getMessage();
        }
    }

    // selecionando elementos no banco
    public function select($sql, $where = [], $fetchMode = \PDO::FETCH_OBJ)
    {
        $sth = $this->prepare($sql);
        foreach ($where as $key => $value) {
            $sth->bindValue(":$key", $value);
        }
        $sth->execute();
        return $sth->fetchAll($fetchMode);
    }

    // insert
    public function insert($table, $data = [])
    {
        $camposNomes = implode(', ', array_keys($data));
        $camposVal = ':' . implode(', :', array_keys($data));

        $sql = sprintf("INSERT INTO %s(%s) VALUES(%s)", $table, $camposNomes, $camposVal);
        $stmt = $this->prepare($sql);

        foreach($data as $key => $value){
            $tipo = is_int($value) ? \PDO::PARAM_INT : \PDO::PARAM_STR;
            $stmt->bindValue(":$key", $value);
        }
        $stmt->execute();

        return $this->lastInsertId();
    }

    public function delete($table, $where, $condition)
    {   
        $sql = sprintf("DELETE FROM %s WHERE %s = %s", $table, $where, $condition);
        $stmt = $this->prepare($sql);   
        $stmt->execute();
    }

    public function update($tabela, $dados = [], $where)
    {
        $newData = null;
        foreach ($dados as $key => $value) {
            $newData .= "`$key` = :$key,"; 
        }

        // rtrim retira virgula da ultima posição
        $newData = rtrim($newData, ",");
        $sql = sprintf("UPDATE %s SET %s WHERE %s", $tabela, $newData, $where);
        $stmt = $this->prepare($sql);

        foreach ($dados as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        return $stmt->execute();
    }
}