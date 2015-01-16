<?php

namespace Mongo\Bundle\Controller;

use Mongo\Bundle\Document\ImportantAuthor;
use MongoCursor;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class QueriesController extends Controller {

    public function pruebaAction() {

//        $mica = $this->get("doctrine_mongodb")->getRepository('MongoBundle:Author')->findOneByName("Micael Gallego");
//        $articulos = $mica->getArticles();
//        $incollections = $mica->getIncollections();
//        $inproceedings = $mica->getInproceedings();
//        $books = $mica->getBooks();
//        $longitud = $mica->getLengthList();
//        $age = $mica->getAge();
//        $annual = $mica->getAnnual();
//        echo "Age:" . $age;
//        echo "Annual:" . $annual;
//        echo "Incollections: " . $incollections->count() . "\n";
//        echo "Books: " . $books->count() . "\n";
//        echo "Inproceedings:" . $inproceedings->count() . "\n";
//        echo "Articles: " . $articulos->count() . "\n";
//        echo $longitud;
//        var_dump(sizeof($inproceedings->toArray()));

        $author = $this->get("doctrine_mongodb")->getRepository('MongoBundle:ImportantAuthor')->findOneByName("se Erdogan");
        $articulos = $author->getArticles();
//        return $this->render("MongoBundle:Queries:prueba.html.twig", array("articles" => $articulos, "author" => $mica, "incollections" => $incollections, "inproceedings" => $inproceedings, "books" => $books));
        return $this->render("MongoBundle:Queries:prueba.html.twig", array("articles" => $articulos, "author" => $author));
    }

    public function importantAuthorsAction() {
        ini_set('memory_limit', '3500M');
        ini_set('max_execution_time', 300000);
        MongoCursor::$timeout = -1;
        set_time_limit(-1);
        $db = $this->get("doctrine_mongodb")->getManager();
        for ($i = 0; $i < 1477550;) {
            $authors = $this->get("doctrine_mongodb")->getRepository("MongoBundle:Author")->findBy(array(), array('id' => 'ASC'), 100000, $i);
            foreach ($authors as $author) {
                if (!$author->isOccasional() && !$author->isNobel()) {
                    $important_author = new ImportantAuthor($author);
                    $db->persist($important_author);
                    $db->flush();
                }
                $i++;
            }
        }
        return $this->render("MongoBundle:Queries:importantAuthors.html.twig");
    }

    public function authorsNoOcasional() {

    }

}
