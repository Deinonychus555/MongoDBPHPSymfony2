<?php

namespace Mongo\Bundle\Controller;

use Mongo\Bundle\Document\ImportantAuthor;
use MongoCursor;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class QueriesController extends Controller {

    public function resultsAction() {
        return $this->render("MongoBundle:Queries:results.html.twig");
    }

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
//        ini_set('memory_limit', '3500M');
//        ini_set('max_execution_time', 300000);
//        MongoCursor::$timeout = -1;
//        set_time_limit(-1);
//        $db = $this->get("doctrine_mongodb")->getManager();
//        for ($i = 0; $i < 1477550;) {
//            $authors = $this->get("doctrine_mongodb")->getRepository("MongoBundle:Author")->findBy(array(), array('id' => 'ASC'), 100000, $i);
//            foreach ($authors as $author) {
//                if (!$author->isOccasional() && !$author->isNobel()) {
//                    $important_author = new ImportantAuthor($author);
//                    $db->persist($important_author);
//                    $db->flush();
//                }
//                $i++;
//            }
//        }
//        return $this->render("MongoBundle:Queries:importantAuthors.html.twig");
    }

    public function sexeniosAction() {
        ini_set('memory_limit', '3500M');
        ini_set('max_execution_time', 300000);
        MongoCursor::$timeout = -1;
        set_time_limit(-1);
        ini_set("max_input_vars", 200000);
        $dm = $authors = $this->get("doctrine_mongodb")->getManager();
        for ($i = 0; $i < 226107; $i++) {
//        $authors = $this->get("doctrine_mongodb")->getRepository("MongoBundle:ImportantAuthor")->findBy(array(), array('id' => 'ASC'), 1, 1);
            $author = $this->get("doctrine_mongodb")->getRepository("MongoBundle:ImportantAuthor")->findOneBy(array(), array('id' => 'ASC'), 1, $i);
            echo 'Author: ' . $i . ' - ' . $author . getName();
//        foreach ($authors as $author) {
            $min_year = $author->getMinYear();
            $max_year = $author->getMaxYear();
            $sexenios = 0;
            $contador = 1;
            if (($max_year - $min_year) >= 12) {
                while ($min_year <= $max_year + 1) {
                    if ($contador <= 6) {
                        $num_articles = $author->getArticlesByYear($min_year);
                        $num_inproceedings = $author->getInproceedingsByYear($min_year);
                        $contador++;
                        $min_year++;
                    } else {
                        if ($num_articles > 3 || ($num_articles + $num_inproceedings > 6 )) {
                            $sexenios++;
                        }
                        $contador = 1;
                    }
                }
            }
            $author->setIndiceSexenio($sexenios);
            $dm->persist($author);
        }
        $dm->flush();
        return $this->render("MongoBundle:Queries:sexenios.html.twig");
    }

}
