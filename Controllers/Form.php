<?php

class Form
{
    private $form;

    public function __construct()
    {
        $this->form=new Formlogin();
    }
    public function index()
    {
        // Logic for the index method of the Login controller
        Load::template("template/head", ["title" => "Login Page", "css" => ["sweetalert.min", "bootstrap.min", "all"]]);
        Load::view("View/form");
        Load::template("template/foot", ["js" => ["reusable/jquery.min", "reusable/bootstrap.bundle.min", "reusable/all", "reusable/sweetalert2.all.min","classe"]]);
    }

    public function getClasse()
{ // string
    $matieres = $_POST["matieres"]; // array
    
    foreach ($matieres as $value) {
        $this->form->getClasse($_POST["className"], $value["matière"], $value["coeff"]);
    }
}
}
