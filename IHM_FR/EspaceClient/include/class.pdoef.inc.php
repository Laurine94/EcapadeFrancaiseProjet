<?php

/**
 
 * @package default
 * @author Cheri Bibi
 * @version    1.0
 * @link       http://www.php.net/manual/fr/book.pdo.php
 */
class PdoEf {

    private static $serveur = 'mysql:host=localhost';
    private static $bdd = 'dbname=ef_fr';
    private static $user = 'root';
    private static $mdp = '';
    private static $monPdo;
    private static $monPdoEf = null;

    /**
     * Constructeur privé, crée l'instance de PDO qui sera sollicitée
     * pour toutes les méthodes de la classe
     */
    private function __construct() {
        PdoEf::$monPdo = new PDO(PdoEf::$serveur . ';' . PdoEf::$bdd, PdoEf::$user, PdoEf::$mdp);
        PdoEf::$monPdo->query("SET CHARACTER SET utf8");
    }

    public function _destruct() {
        PdoEf::$monPdo = null;
    }

    /**
     * Fonction statique qui crée l'unique instance de la classe

     * Appel : $instancePdoEf = PdoGsb::getPdoEf();

     * @return l'unique objet de la classe PdoEf
     */
    public static function getPdoEf() {
        if (PdoEf::$monPdoEf == null) {
            PdoEf::$monPdoEf = new PdoEf();
        }
        return PdoEf::$monPdoEf;
    }

    
    
    public  static function getPdo(){
		
		return PdoEf::$monPdo;  
	} 
        

    /**
     * Retourne les informations d'un client

     * @param $mail
     * @param $mdp
     * @return le numero, le nom et le prénom sous la forme d'un tableau
     */
    public function getInfosClient($mail, $mdp) {
        $req = "select client.num_client as num_client, client.nom_client as nom_client, client.prenom_client as prenom_client from client 
		where client.mail_client='$mail' and client.mdp='$mdp'";
        $rs = PdoEf::$monPdo->query($req);
        $ligne = $rs->fetch();
        return $ligne;
    }
}
    