<?php

namespace Mongo\Bundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * Description of Incollection
 *
 * @author Javier
 * @author Juan Antonio
 * @author Oscar
 */

/**
 * @MongoDB\Document(collection="Incollections")
 */
class Incollection {
    //put your code here
    
    /**
     * @MongoDB\Id
     */
    protected $id;
    
    /**
     * @MongoDB\Collection
     */
    protected $author = array();
    
    /**
     * @MongoDB\String
     */
    protected $title;
    
    /**
     * @MongoDB\String
     */
    protected $bookTitle;
    
    /**
     * @MongoDB\String
     */
    protected $crossref;
    
    /**
     * @MongoDB\Int
     */
    protected $year;
    
    function getId() {
        return $this->id;
    }

    function getAuthor() {
        return $this->author;
    }

    function getTitle() {
        return $this->title;
    }

    function getBookTitle() {
        return $this->bookTitle;
    }

    function getCrossref() {
        return $this->crossref;
    }

    function getYear() {
        return $this->year;
    }

    function setId($id) {
        $this->id = $id;
        return $this;
    }

    function setAuthor($author) {
        $this->author = $author;
        return $this;
    }

    function setTitle($title) {
        $this->title = $title;
        return $this;
    }

    function setBookTitle($bookTitle) {
        $this->bookTitle = $bookTitle;
        return $this;
    }

    function setCrossref($crossref) {
        $this->crossref = $crossref;
        return $this;
    }

    function setYear($year) {
        $this->year = $year;
        return $this;
    }


}
