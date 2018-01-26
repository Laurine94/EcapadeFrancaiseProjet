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

    public static function getPdo() {

        return PdoEf::$monPdo;
    }

    /**
     * Retourne les informations d'un client

     * @param $mail
     * @param $mdp
     * @return le numero, le nom et le prénom sous la forme d'un tableau
     */
    public function getInfosClient($mail, $mdp) {
        $req = "select client.num_client as num, client.nom_client as nom, client.prenom_client as prenom from client 
		where client.mail_client='$mail' and client.mdp='$mdp'";
        $rs = PdoEf::$monPdo->query($req);
        $ligne = $rs->fetch();
        return $ligne;
    }

    public function sauvegardeClient($nom, $prenom, $sexe, $mail, $tel, $adresse, $ville, $cp, $pays, $mdp, $confirmkey) {
        // Hachage du mot de passe
        $mdp_hache = password_hash($_POST['mdp'], PASSWORD_DEFAULT);

        // Insertion
        $req = PdoEf::$monPdo->prepare('INSERT INTO client(nom_client, prenom_client, sexe_client, tel_client, adresse_client, mdp, ville_client, zip_client, pays_client, mail_client, confirmkey) '
                . 'VALUES(:nom, :prenom, :sexe, :tel, :adresse, :mdp, :ville, :cp, :pays, :mail,:confirmkey)');
        $req->execute(array(
            'nom' => $nom,
            'prenom' => $prenom,
            'sexe' => $sexe,
            'tel' => $tel,
            'adresse' => $adresse,
            'mdp' => $mdp,
            'ville' => $ville,
            'cp' => $cp,
            'pays' => $pays,
            'mail' => $mail,
            'confirmkey' => $confirmkey));
    }

    public function mailExiste($mail) {
        $sql = "select count(num_client) from client where mail_client='$mail'";
        $rs = PdoEf::$monPdo->query($sql);
        $ligne = $rs->fetch();
        if ($ligne != 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getClient($mail, $key) {
        $req = PdoEf::$monPdo->prepare("select * from client where mail_client=? And confirmkey=?");
        $req->execute(array($mail, $key));
        $user = $req->fetch();
        return $user;
    }

    public function clientExist($mail, $key) {
        $req = PdoEf::$monPdo->prepare("select * from client where mail_client=? And confirmkey=?");
        $req->execute(array($mail, $key));
        $userexist = $req->rowCount();
        return $userexist;
    }

    public function majKey($mail, $key) {
        $req = PdoEf::$monPdo->prepare("UPDATE client set confirm=1 where mail_client=? and confirmkey=?");
        $req->execute(array($mail, $key));
    }

    public function getReservationDisponible($id) {
        $sql = "select * from reservation join client on reservation.num_client=client.num_client where reservation.num_client='$id'";
        $resultat = PdoEf::$monPdo->query($sql);
        $ligne = $resultat->fetchAll();
        return $ligne;
    }

    public function getReservation($id, $numRes) {
        $req = "select * from  chambre join reservation on reservation.nom_chambre=chambre.nom_chambre join client on reservation.num_client=client.num_client where reservation.num_client=$id and reservation.num_res=$numRes";
        $res = PdoEf::$monPdo->query($req);
        $laLigne = $res->fetch();
        return $laLigne;
    }

    public function getVoyageur($numRes) {
        $sql = "select * from voyageur join voyageurreservation on voyageurreservation.num_voyageur=voyageur.num_voyageur where num_res=$numRes";
        $resultat = PdoEf::$monPdo->query($sql);
        $ligne = $resultat->fetchAll();
        return $ligne;
    }

    
    
    public function getReservationPdf($id, $numRes) {
        $req = "select reservation.nom_chambre, reservation.nombre_nuits,reservation.nombrePersonnes,chambre.prix_chambre from client join reservation on reservation.num_client=client.num_client join chambre on reservation.nom_chambre=chambre.nom_chambre where reservation.num_client=$id and reservation.num_res=$numRes";
        $res = PdoEf::$monPdo->query($req);
        $laLigne = $res->fetchAll();
        return $laLigne;
    }

    public function getReservationAVenir($id) {
        $req = "select * from reservation where date_debut> NOW() and num_client=$id";
        $res = PdoEf::$monPdo->query($req);
        $laLigne = $res->fetchAll();
        return $laLigne;
    }
    
    public function getActiviteReservationAVenir($id){
        $req = "select nom_activite, prix_res from reservation where date_debut> NOW() and num_client=$id";
        $res = PdoEf::$monPdo->query($req);
        $laLigne = $res->fetchAll();
        return $laLigne;
    }
    public function getHebergementReservationAVenir($id){
        $req = "select nom_chambre, nom_mh, prix_res from reservation where date_debut> NOW() and num_client=$id";
        $res = PdoEf::$monPdo->query($req);
        $laLigne = $res->fetchAll();
        return $laLigne;
    }

}
