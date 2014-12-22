<?php

namespace Mongo\Bundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * Description of Article
 *
 * @author Javier
 * @author Juan Antonio
 * @author Oscar
 */

/**
 * @MongoDB\Document(collection="Articles")
 */
class Article {
    //put your code here
    
    /**
     * @MongoDB\Id
     */
    protected $id;
    
    /**
     * @MongoDB\Collection
     */
    protected $authors = array();
    
    /**
     * @MongoDB\String
     */
    protected $title;
    
    /**
     * @MongoDB\Int
     */
    protected $year;
    
    /**
     * @MongoDB\String
     */
    protected $journal;
    
    /**
     * @MongoDB\String
     */
    protected $crossref;
    
    
    function getId() {
        return $this->id;
    }

    function getAuthors() {
        return $this->authors;
    }

    function getTitle() {
        return $this->title;
    }

    function getYear() {
        return $this->year;
    }

    function getJournal() {
        return $this->journal;
    }

    function getCrossref() {
        return $this->crossref;
    }

    function setId($id) {
        $this->id = $id;
        return $this;
    }

    function setAuthors($authors) {
        $this->authors = $authors;
        return $this;
    }

    function setTitle($title) {
        $this->title = $title;
        return $this;
    }

    function setYear($year) {
        $this->year = $year;
        return $this;
    }

    function setJournal($journal) {
        $this->journal = $journal;
        return $this;
    }

    function setCrossref($crossref) {
        $this->crossref = $crossref;
        return $this;
    }


}
