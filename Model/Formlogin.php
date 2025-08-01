<?php

class Formlogin{
    private $classe;

    public function __construct()
    {
        $this->classe = new Query();
    }

    public function getClasse($classe, $matiere,$coeff)
    {
        $classe=$this->classe->customQuery("SELECT * FROM classe WHERE CLASSE=? AND MATIERE=?", "select")->execute([$classe, $matiere]);
        if($classe){
            return false; // Classe already exists
        }else{
            $this->classe->customQuery("INSERT INTO classe (CLASSE, MATIERE,COEFF) VALUES (?, ?, ?)", "insert")->execute([$classe, $matiere, $coeff]);
            return true;
        }
    }
}