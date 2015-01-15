<?php

namespace Mongo\Bundle\Controller;

use Mongo\Bundle\Document\Author;
use MongoCursor;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller {

    public function indexAction() {
        return $this->render('MongoBundle:Default:index.html.twig');
    }

    public function crearAction(Request $request) {
        //Creamos un autor
        $autor = new Author();

        //Creamos un formulario de symfony enlazado con el autor
        $form = $this->createFormBuilder($autor)
                ->add("name", "text", array('label' => 'Escribe el nombre del autor', 'required' => true))
                ->add("enviar", "submit", array('label' => 'Crear'))
                ->getForm();
        //Unimos el request con el formulario para obtener los datos del autor
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //Obtenemos el Document Manager de MongoDB
            $dm = $this->get('doctrine_mongodb')->getManager();
            //Hacemos que el DM controle al autor
            $dm->persist($autor);
            //Guardamos en la BD.
            $dm->flush();
            //Redireccionamos a la página de inicio.
            return $this->redirect($this->generateUrl("mongo_homepage"));
        }
        //Mostramos la vista donde está el formulario
        //¡Importante! $form->createView()!!
        return $this->render("MongoBundle:Default:crearAutor.html.twig", array('form' => $form->createView()));
    }

    public function eliminarAction($id) {
        //Buscamos en el repositorio el id
        $autor = $this->get("doctrine_mongodb")->getRepository("MongoBundle:Author")->find($id);

        if (!$autor) {
            return $this->createNotFoundException("No se ha encontrado el autor con id: " . $id);
        }
        //Obtenemos el document manager
        $dm = $this->get("doctrine_mongodb")->getManager();
        //Eliminamos del document manager al autor
        $dm->remove($autor);
        //Realizamos los cambios
        $dm->flush();
        //Redirigimos a la tabla donde están todos los autores.
        return $this->redirect($this->generateUrl("mongo_buscar_todos"));
    }

    public function verAutoresAction() {
        ini_set('memory_limit', '3500M');
        ini_set('max_execution_time', 300000);
        MongoCursor::$timeout = -1;
        set_time_limit(-1);
        //Buscamos todos los autores
        $autores = $this->get('doctrine_mongodb')->getRepository("MongoBundle:Author")->findAll();
        //Mostramos la vista y pasamos el resultado.
        return $this->render("MongoBundle:Default:verAutores.html.twig", array('result' => $autores));
    }

    public function buscarNombreAction(Request $request) {
        //Creamos un formulario de symfony
        $form = $this->createFormBuilder()
                ->add("name", "text", array('label' => 'Escribe el nombre del autor', 'required' => true))
                ->add("enviar", "submit", array('label' => 'Buscar'))
                ->getForm();
        //Unimos el formulario con el request http que se ha generado
        $form->handleRequest($request);

        //Si se ha enviado el formulario y es válido
        if ($form->isSubmitted() && $form->isValid()) {
            //Obtenemos los datos del formulario
            $datos = $form->getData();
            //Obtenemos los datos del array en la posicion "nombre"
            $nombre = $datos['nombre'];
            //Buscamos el nombre en el repositorio de Autor
            $autor = $this->get('doctrine_mongodb')->getRepository('MongoBundle:Author')->findByName($nombre);
            //Si no existe o es igual a NULL
            if (!$autor) {
                throw $this->createNotFoundException("No se ha encontrado el autor con el nombre: " . $nombre);
            }
            //Mostramos la vista con la tabla de resultados
            return $this->render("MongoBundle:Default:busqueda.html.twig", array('result' => $autor, 'busqueda' => $nombre));
        }
        //Mostramos el formulario de búsqueda.
        return $this->render("MongoBundle:Default:buscarAutor.html.twig", array('form' => $form->createView()));
    }

}
