<?php
namespace Mongo\Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DataTablesController
 *
 * @author oscarmirandabravo
 */
class DataTablesController extends Controller{
    
    public function tableAuthorsAction() {
        $authors = $this->get("doctrine_mongodb")->getRepository('MongoBundle:Author')->findBy(array(), array("id"=>"ASC"),100,0);
        return $this->render("MongoBundle:Queries:results.html.twig", array("authors"=>$authors, "dataTable"=>"autores"));
    }
    
    public function tableImportantAuthorsAction() {
        $authors = $this->get("doctrine_mongodb")->getRepository('MongoBundle:ImportantAuthor')->findBy(array(), array("id"=>"ASC"),100,0);
        return $this->render("MongoBundle:Queries:results.html.twig", array("authors"=>$authors, "dataTable"=>"autores importantes"));
    }
    
    public function tableSexenioAuthorsAction() {
        $authors = $this->get("doctrine_mongodb")->getRepository('MongoBundle:SexenioAuthor')->findBy(array(), array("id"=>"ASC"),100,0);
        return $this->render("MongoBundle:Queries:results.html.twig", array("authors"=>$authors,"dataTable"=>"sexenios >= 2"));
    }
    
    public function tableInadecuateAuthorsAction() {
        $authors = $this->get("doctrine_mongodb")->getRepository('MongoBundle:InadecuateAuthor')->findBy(array(), array("id"=>"ASC"),100,0);
        return $this->render("MongoBundle:Queries:results.html.twig", array("authors"=>$authors, "dataTable"=>"autores inadecuados"));
    }
    
    public function tableUnproductiveAuthorsAction() {
        $authors = $this->get("doctrine_mongodb")->getRepository('MongoBundle:UnproductiveAuthor')->findBy(array(), array("id"=>"ASC"),100,0);
        return $this->render("MongoBundle:Queries:results.html.twig", array("authors"=>$authors, "dataTable"=>"autores improductivos"));
    }
    
    public function tableTravellerAuthorsAction() {
        $authors = $this->get("doctrine_mongodb")->getRepository('MongoBundle:TravellerAuthor')->findBy(array(), array("id"=>"ASC"),100,0);
        return $this->render("MongoBundle:Queries:results.html.twig", array("authors"=>$authors, "dataTable"=>"autores viajeros"));
    }
    
    public function tableSociableAuthorsAction() {
        $authors = $this->get("doctrine_mongodb")->getRepository('MongoBundle:SociableAuthor')->findBy(array(), array("id"=>"ASC"),100,0);
        return $this->render("MongoBundle:Queries:results.html.twig", array("authors"=>$authors, "dataTable"=>"autores sociables"));
    }
    
    public function tableStableAuthorsAction() {
        $authors = $this->get("doctrine_mongodb")->getRepository('MongoBundle:StableAuthor')->findBy(array(), array("id"=>"ASC"),100,0);
        return $this->render("MongoBundle:Queries:results.html.twig", array("authors"=>$authors, "dataTable"=>"autores estables"));
    }
    
    public function tableEditorAuthorsAction() {
        $authors = $this->get("doctrine_mongodb")->getRepository('MongoBundle:EditorAuthor')->findBy(array(), array("id"=>"ASC"),100,0);
        return $this->render("MongoBundle:Queries:results.html.twig", array("authors"=>$authors, "dataTable"=>"autores redactores"));
    }
    
}
