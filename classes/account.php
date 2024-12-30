<?php
    class account{
        protected $accountNumber;
        protected $titulaire;
        protected $solde;
        protected $type;
        public function __construct($accountNumber, $titulaire, $solde, $type) {
            $this->accountNumber = $accountNumber;
            $this->titulaire = $titulaire;
            $this->solde = $solde;
            $this->type = $type;
        }
    
        public function getAccountNumber() {
            return $this->accountNumber;
        }
    
        public function getTitulaire() {
            return $this->titulaire;
        }
    
        public function getSolde() {
            return $this->solde;
        }
        public function getType() {
            return $this->type;
        }
    
        public function addAccount($conn) {
            $sql = "INSERT INTO account (numero_de_compte, titulaire, solde, type) VALUES ($this->accountNumber, '$this->titulaire', $this->solde, '$this->type')";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
        }
    }
?>

