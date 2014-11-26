<?php

namespace Mongo\Bundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document(collection="autores")
 */
class Autor {

    /**
     * @MongoDB\Id
     */
    protected $id;

    /**
     * @MongoDB\String
     */
    protected $nombre;

    /**
     *
     * @MongoDB\Int
     */
    protected $edad;

    public function __construct($nombre = "", $edad = 0) {
        $this->nombre = $nombre;
        $this->edad = $edad;
    }

    /**
     * Get id
     *
     * @return id $id
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return self
     */
    public function setNombre($nombre) {
        $this->nombre = $nombre;
        return $this;
    }

    /**
     * Get nombre
     *
     * @return string $nombre
     */
    public function getNombre() {
        return $this->nombre;
    }

    /**
     * Set edad
     *
     * @param int $edad
     * @return self
     */
    public function setEdad($edad) {
        $this->edad = $edad;
        return $this;
    }

    /**
     * Get edad
     *
     * @return int $edad
     */
    public function getEdad() {
        return $this->edad;
    }

}
