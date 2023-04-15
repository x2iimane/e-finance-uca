<?php
/**
 * Created by IntelliJ IDEA.
 * User: UNKNOWN
 * Date: 17/08/2016
 * Time: 13:10
 */




class ArticlesJSON{

    public $articles_description;
    public $articles_intitule;
    public $articles_prix;
    public $artilces_quantite;


    public function __construct($articles_description,$articles_intitule,$artilces_quantite,$articles_prix)
    {
        $this->articles_description = $articles_description;
        $this->articles_intitule = $articles_intitule;
        $this->artilces_quantite = $artilces_quantite;
        $this->articles_prix = $articles_prix;
    }
}
