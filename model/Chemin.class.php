<?php

class Chemin extends Model {

    public function __construct($id) {
        parent::__construct();
    }

    //***************************************************Accesseurs****************************************************************

    public static function infos_chemin($chemin){
        $sql = self::$queries['INFOS_CHEMIN'];
        $params = array(': chemin');
        $args = array($chemin);
        $request = parent::exec($sql, $params, $args);
        return $request->fetch(PDO::FETCH_OBJ);        
    }

}
?>

