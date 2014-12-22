<?php

namespace Mongo\Bundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class QueriesController extends Controller {

    /**
     * @Route("/importantAuthors")
     */
    public function importantAuthorsAction() {

//        $authorsArticle = $this->get("doctrine_mongodb")->getManager()->createQueryBuilder('MongoBundle:Article')
//                        ->select('authors')
//                        ->where()
//                        ->limit(10)
//                        ->getQuery()->execute();
        $authorsArticle = $this->get("doctrine_mongodb")->getRepository('MongoBundle:Article')->findByAuthors("Micael Gallego");
        var_dump($authorsArticle);
        $author = $this->get("doctrine_mongodb")->getRepository('MongoBundle:Author')->findOneByName("Micael Gallego");
        var_dump($author);
        $articles = $author->getArticles();
        var_dump($articles);

        return $this->render("MongoBundle:Queries:importantAuthors.html.twig", array("articles" => $articles));
    }

}
