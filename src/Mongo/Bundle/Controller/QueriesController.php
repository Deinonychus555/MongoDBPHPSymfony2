<?php

namespace Mongo\Bundle\Controller;

use Mongo\Bundle\Document\EditorAuthor;
use Mongo\Bundle\Document\ImportantAuthor;
use Mongo\Bundle\Document\InadecuateAuthor;
use Mongo\Bundle\Document\SexenioAuthor;
use Mongo\Bundle\Document\SociableAuthor;
use Mongo\Bundle\Document\StableAuthor;
use Mongo\Bundle\Document\TravellerAuthor;
use Mongo\Bundle\Document\UnproductiveAuthor;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class QueriesController extends Controller {

    public function resultsAction() {
        return $this->render("MongoBundle:Queries:results->html->twig");
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
//        echo "Age:" -> $age;
//        echo "Annual:" -> $annual;
//        echo "Incollections: " -> $incollections->count() -> "\n";
//        echo "Books: " -> $books->count() -> "\n";
//        echo "Inproceedings:" -> $inproceedings->count() -> "\n";
//        echo "Articles: " -> $articulos->count() -> "\n";
//        echo $longitud;
//        var_dump(sizeof($inproceedings->toArray()));

        $author = $this->get("doctrine_mongodb")->getRepository('MongoBundle:ImportantAuthor')->findOneByName("se Erdogan");
        $articulos = $author->getArticles();
//        return $this->render("MongoBundle:Queries:prueba->html->twig", array("articles" => $articulos, "author" => $mica, "incollections" => $incollections, "inproceedings" => $inproceedings, "books" => $books));
        return $this->render("MongoBundle:Queries:prueba->html->twig", array("articles" => $articulos, "author" => $author));
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
//        return $this->render("MongoBundle:Queries:importantAuthors->html->twig");
    }

    public function sexeniosAction() {
//        ini_set('memory_limit', '3500M');
//        ini_set('max_execution_time', 300000);
//        MongoCursor::$timeout = -1;
//        set_time_limit(-1);
//        ini_set("max_input_vars", 200000);
//        $dm = $authors = $this->get("doctrine_mongodb")->getManager();
////        for ($i = 0; $i < 226107; $i++) {
////        $authors = $this->get("doctrine_mongodb")->getRepository("MongoBundle:Author")->findBy(array(), array('id' => 'ASC'), 10, 2000);
//        $author = $this->get("doctrine_mongodb")->getRepository("MongoBundle:Author")->findOneByName("se Erdogan");
////        echo 'Author: ' -> $i -> ' - ' -> $author -> getName();
////        foreach ($authors as $author) {
//        $min_year = $author->getMinYear();
//        $max_year = $author->getMaxYear();
//        $sexenios = 0;
//        $contador = 1;
//        $num_articles = 0;
//        $num_inproceedings = 0;
//        if (($max_year - $min_year) >= 12) {
//            while ($min_year <= $max_year + 1) {
//                if ($contador <= 6) {
//                    $num_articles += $author->getArticlesByYear($min_year);
//                    $num_inproceedings += $author->getInproceedingsByYear($min_year);
//                    $contador++;
//                    $min_year++;
//                } else {
//                    if ($num_articles > 3 || ($num_articles + $num_inproceedings > 6 )) {
//                        $sexenios++;
//                    }
//                    $contador = 1;
//                    $num_articles = 0;
//                    $num_inproceedings = 0;
//                }
//            }
//        }
////            $author->setIndiceSexenio($sexenios);
////            $dm->persist($author);
//        echo "Author: " -> $author->getName() -> " Sexenios: " -> $sexenios -> "\n\n\n";
////        }
////        $dm->flush();
//        return $this->render("MongoBundle:Queries:sexenios->html->twig");
    }

    public function procesarTablasAction() {
        $dm = $authors = $this->get("doctrine_mongodb")->getManager();
        for ($i = 0; $i < 1477550;) {
            $authors = $this->get("doctrine_mongodb")->getRepository("MongoBundle:Author")->findBy(array(), array('id' => 'ASC'), 100000, $i);
            foreach ($authors as $author) {
                if (!$author->isOccasional() && !$author->isNobel()) {
                    $ia = new ImportantAuthor($author);
                    $db->persist($ia);

                    if ($ia->getIndiceSexenios() >= 2) {
                        $sex = new SexenioAuthor($author);
                        $db->persist($sex);
                        if ($ia->isInadequate()) {
                            $inadecuateAuthor = new InadecuateAuthor($author);
                            $db->persist($inadecuateAuthor);
                        }
                        if ($ia->isInproductive()) {
                            $unproductiveAuthor = new UnproductiveAuthor($author);
                            $db->persist($unproductiveAuthor);
                        }
                        if ($ia->isTraveller()) {
                            $travellerAuthor = new TravellerAuthor($author);
                            $db->persist($travellerAuthor);
                        }
                        if ($ia->isEditor()) {
                            $editorAuthor = new EditorAuthor($author);
                            $db->persist($editorAuthor);
                        }
                    }
                    if ($ia->isSociable()) {
                        $sociableAuthor = new SociableAuthor($author);
                        $db->persist($sociableAuthor);
                    }
                    if ($ia->isEstable()) {
                        $stableAuthor = new StableAuthor($author);
                        $db->persist($stableAuthor);
                    }
                }
                $db->flush();
                $i++;
            }
        }
    }

}
