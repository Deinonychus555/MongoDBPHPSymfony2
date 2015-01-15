<?php

namespace Mongo\Bundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Mongo\Bundle\Document\Author;

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
     * @MongoDB\ReferenceMany(targetDocument="Author")
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

    public function __construct() {
        $this->authors = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getLengthAuthors() {
        return (sizeof($this->authors->toArray()));
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
     * Add author
     *
     * @param Mongo\Bundle\Document\Author $author
     */
    public function addAuthor(\Mongo\Bundle\Document\Author $author) {
        $this->authors[] = $author;
    }

    /**
     * Remove author
     *
     * @param Mongo\Bundle\Document\Author $author
     */
    public function removeAuthor(\Mongo\Bundle\Document\Author $author) {
        $this->authors->removeElement($author);
    }

    /**
     * Get authors
     *
     * @return Doctrine\Common\Collections\Collection $authors
     */
    public function getAuthors() {
        return $this->authors;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return self
     */
    public function setTitle($title) {
        $this->title = $title;
        return $this;
    }

    /**
     * Get title
     *
     * @return string $title
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * Set year
     *
     * @param int $year
     * @return self
     */
    public function setYear($year) {
        $this->year = $year;
        return $this;
    }

    /**
     * Get year
     *
     * @return int $year
     */
    public function getYear() {
        return $this->year;
    }

    /**
     * Set journal
     *
     * @param string $journal
     * @return self
     */
    public function setJournal($journal) {
        $this->journal = $journal;
        return $this;
    }

    /**
     * Get journal
     *
     * @return string $journal
     */
    public function getJournal() {
        return $this->journal;
    }

    /**
     * Set crossref
     *
     * @param string $crossref
     * @return self
     */
    public function setCrossref($crossref) {
        $this->crossref = $crossref;
        return $this;
    }

    /**
     * Get crossref
     *
     * @return string $crossref
     */
    public function getCrossref() {
        return $this->crossref;
    }

}
