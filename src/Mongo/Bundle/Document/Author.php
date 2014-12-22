<?php

namespace Mongo\Bundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * Description of Author
 *
 * @author Javier
 * @author Juan Antonio
 * @author Oscar
 */

/**
 * @MongoDB\Document(collection="Authors")
 */
class Author {

    /**
     * @MongoDB\Id
     */
    protected $id;

    /**
     * @MongoDB\String
     */
    protected $name;

    /**
     * @MongoDB\Collection
     */
    protected $cites = array();

    /**
     *
     * @MongoDB\ReferenceMany(targetDocument="Article", inversedBy="authors")
     */
    protected $articles = array();

    /**
     * Get id
     *
     * @return id $id
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return self
     */
    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    /**
     * Get name
     *
     * @return string $name
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Set cites
     *
     * @param collection $cites
     * @return self
     */
    public function setCites($cites) {
        $this->cites = $cites;
        return $this;
    }

    /**
     * Get cites
     *
     * @return collection $cites
     */
    public function getCites() {
        return $this->cites;
    }

    function getArticles() {
        return $this->articles;
    }

    function setArticles($articles) {
        $this->articles = $articles;
        return $this;
    }

}
