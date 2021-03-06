<?php

namespace TP\Models;

require_once APP . 'core/DB.php';

use TP\Core\DB;

class Admin{

    public static function checkAdmin($nom,$mdp) {
        $db= DB::getInstance();

        $stmt = $db->prepare("SELECT * FROM admin WHERE nom = :nom AND mot_de_passe = :mdp");

        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':mdp', $mdp);

        $stmt->execute();

        $count = $stmt->rowCount();

        if($count > 0){
            return true;
        }

        return false;
    }
}