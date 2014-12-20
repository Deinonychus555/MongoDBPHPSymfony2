<?php

namespace Mongo\Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UsuarioController extends Controller
{
    public function indexAction()
    {
        return $this->render('MongoBundle:Usuario:index.html.twig', array(
                // ...
            ));    }

}
