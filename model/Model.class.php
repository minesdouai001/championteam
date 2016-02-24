<?php

class Model extends MyObject {

    protected $database;
    protected static $queries = array('name' => 'query');

    public function __construct() {
        parent::__construct();
    }

    protected static function db() {
        return DatabasePDO::getCurrentDB();
    }

    public static function addSqlQuery($name, $sql) {
        self::$queries[$name] = $sql;
    }

    public static function exec($sql, $params = array(), $args = array()) {
        $sql = str_replace($params, $args, $sql);
        return static::db()->query($sql);
    }

    /*public static function exec_multiple($sql, $params = array(), $args = array()) {
        //var_dump($sql);
        $sql = str_replace($params, $args, $sql);
        //var_dump($sql);        
        //$statement = static::db()->query($sql);
        //var_dump($statement);
        //var_dump($statement->execute());
        var_dump($statement = static::db()->query("SELECT NO_CARTE_WAGON
            FROM CARTE_WAGON
            WHERE NO_UTILISATEUR IS NULL
            ORDER BY RAND()
            LIMIT 1;SELECT NO_CARTE_WAGON
                FROM CARTE_WAGON
                WHERE NO_UTILISATEUR IS NULL
                ORDER BY RAND()
                LIMIT 4;"));
        /* do {
          var_dump($statement->fetch());
          $statement->closeCursor();
          } while ($statement->nextRowset()); */
       /* while ($rowset = $statement->fetch()) {
            $data = $rowset;
            var_dump($data);
            $statement->nextRowset();
        }
        return $data;
    }*/

    //**************************A deplacer***************************
    public static function destinations() {
        $request = static::db()->query('SELECT VILLE.NOM, ciudad.NOM AS NOM2, `NB_FOIS_JOUEE`, `NB_FOIS_REUSSIE`
								FROM VILLE, VILLE ciudad, DESTINATION
								WHERE VILLE.NO_VILLE= DESTINATION.NO_VILLE AND ciudad.NO_VILLE= DESTINATION.`VIL_NO_VILLE`
								ORDER BY `NB_FOIS_JOUEE` DESC');
        return $request->fetchAll(PDO::FETCH_OBJ);
        ;
    }

    public static function villes() {
        $request = static::db()->query('SELECT VILLE.NOM, ciudad.NOM AS NOM2, `NB_FOIS_JOUEE`, `NB_FOIS_REUSSIE`
								FROM VILLE, VILLE ciudad, DESTINATION
								WHERE VILLE.NO_VILLE= DESTINATION.NO_VILLE AND ciudad.NO_VILLE= DESTINATION.`VIL_NO_VILLE`
								ORDER BY `NB_FOIS_JOUEE` DESC');
        return $request->fetchAll(PDO::FETCH_OBJ);
        ;
    }

}

?>