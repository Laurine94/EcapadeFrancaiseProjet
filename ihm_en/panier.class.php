<?php

  class panier{

    private $DB;

    public function __construct($DB){
      if(!isset($_SESSION)){
        session_start();
      }
      if(!isset($_SESSION['panier'])){
        $_SESSION['panier'] = array();
      }
      $this->DB = $DB;
      
      if(isset($_GET['delPanier'])){
        $this->del($_GET['delPanier']);
      }
      if(isset($_POST['panier']['quantity'])){
        $this->recalc();
      }
    }

    public function recalc(){
      foreach($_SESSION['panier'] as $coffret_id => $quantity){
        if(isset($_POST['panier']['quantity'][$coffret_id])){
          $_SESSION['panier'][$coffret_id] = $_POST['panier']['quantity'][$coffret_id];
        }
      }
    }

    public function count(){
      return array_sum($_SESSION['panier']);
    }

    public function total(){
      $total = 0;
      $ids = array_keys($_SESSION['panier']);
      if(empty($ids)){
        $coffret = array();
      }else{
        $coffret = $this->DB->query('SELECT id, prix FROM coffret WHERE id IN ('.implode(',',$ids).')');
      }
      foreach($coffret as $coffret){
        $total += $coffret->prix * $_SESSION['panier'][$coffret->id];
      }
      return $total;
    }

    public function add($coffret_id){
      if(isset($_SESSION['panier'][$coffret_id])){
        $_SESSION['panier'][$coffret_id]++;
      }else{
        $_SESSION['panier'][$coffret_id] = 1;
      }
    }

    public function del($coffret_id){
      unset($_SESSION['panier'][$coffret_id]);
    }
  }

?>