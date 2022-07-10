<?php

class Db {
    private static PDO $PDOInstance;

    private PDO $pdo;

    public function __construct(){
        $this->pdo = self::getPDOInstance();
    }

    public static function getPDOInstance(): PDO {
        if (!isset(self::$PDOInstance)){
            try {
                self::$PDOInstance = new PDO("mysql:host=".DB_HOSTNAME.";dbname=".DB_NAME.";charset=".DB_CHARSET, DB_USERNAME, DB_PASSWORD,
                [
                    PDO::ATTR_EMULATE_PREPARES  => false,
                    PDO::ATTR_STRINGIFY_FETCHES => false
                ]);
            }catch (PDOException $e){
                echo $e->getMessage();
                echo '500';
            }
        }
        return self::$PDOInstance;
    }

    public function executeGet($query, $data=[], $mode=PDO::FETCH_ASSOC){
        $db = $this->pdo->prepare($query);
        if ($db === false)
            return null;
        for ($i=1; $i<=count($data); $i++)
            $db->bindParam($i, $data[$i-1]);

        $db->execute();

        $db->setFetchMode($mode);
        return $db->fetchAll();
    }

    public function getById($table, $id, $mode = PDO::FETCH_ASSOC){
        $db = $this->pdo->prepare("SELECT * FROM $table WHERE id = ?");
        if ($db === false)
            return null;

        $db->bindParam(1, $id);
        $db->execute();
        $db->setFetchMode($mode);
        return $db->fetch();
    }

    public function getByField($table, $field, $value, $whereClause = null, $mode = PDO::FETCH_ASSOC){
        $db = $this->pdo->prepare("SELECT * FROM $table WHERE $field = ? " . ($whereClause ?: ""));
        if ($db === false)
            return null;
        $db->bindParam(1, $value);
        $db->execute();
        $db->setFetchMode($mode);
        return $db->fetch();
    }

    public function getAll($table, $mode = PDO::FETCH_ASSOC){
        $db = $this->pdo->prepare("SELECT * FROM $table");
        if ($db === false)
            return null;

        $db->execute();
        $db->setFetchMode($mode);
        return $db->fetchAll();
    }

    public function getAllWhere($table, $field, $value, $whereClause = null, $mode = PDO::FETCH_ASSOC){
        $db = $this->pdo->prepare("SELECT * FROM $table WHERE $field = ? " . ($whereClause ?: ""));
        if ($db === false)
            return null;
        $db->bindParam(1, $value);
        $db->execute();
        $db->setFetchMode($mode);
        return $db->fetchAll();
    }

    public function insert($table, $data = []) {
        if (count($data) == 0)
            throw new Exception("Invalid insert data.");

        $formatedQueryParams = formatQueryParams($data);

        $i = 0;
        $db = $this->pdo->prepare("INSERT INTO $table ($formatedQueryParams[0]) VALUES ($formatedQueryParams[1])");
        if ($db === false)
            return null;

        foreach($data as $value)
            $db->bindValue(++$i, $value);
        $db->execute();
        return $this->pdo->lastInsertId();
    }

    /**
     * `id` has to be the last attr in the data array
     * @param $table
     * @param $data
     * @return bool|null
     * @throws Exception
     */
    public function update($table, $data = []) {
        if (count($data) == 0)
            throw new Exception("Invalid update data.");

        $strData = "";

        foreach ($data as $column => $value) {
            if ($column == 'id')
                continue;

            $strData .= $column . "=?,";
        }

        $strData = substr($strData, 0, strlen($strData) - 1);

        $db = $this->pdo->prepare("UPDATE $table SET $strData WHERE id = ?");
        //echo $db->queryString;
        if ($db === false)
            return null;

        return $db->execute(array_values($data));
    }

    public function delete($table, $data = []) {
        if (count($data) == 0)
            throw new Exception("Invalid delete data.");

        $formatedQueryParams = formatQueryParams($data, " = ?,");

        $db = $this->pdo->prepare("DELETE FROM $table WHERE $formatedQueryParams[0]");
        if ($db === false)
            return null;

        return $db->execute(array_values($data));
    }
}