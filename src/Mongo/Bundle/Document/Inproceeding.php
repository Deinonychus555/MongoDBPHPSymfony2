<?php

namespace Mongo\Bundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * Description of Inproceeding
 *
 * @author Javier
 * @author Juan Antonio
 * @author Oscar
 */

/**
 * @MongoDB\Document(collection="Inproceedings")
 */
class Inproceeding {

    /**
     *
     * @MongoDB\Id
     */
    protected $id;

    /**
     *
     * @MongoDB\Collection
     */
    protected $author = array();

    /**
     *
     * @MongoDB\String
     */
    protected $title;

    /**
     *
     * @MongoDB\Int
     */
    protected $year;

    /**
     *
     * @MongoDB\String
     */
    protected $bookTitle;

    /**
     *
     * @MongoDB\String
     */
    protected $crossref;


    /**
     * Get id
     *
     * @return id $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set author
     *
     * @param collection $author
     * @return self
     */
    public function setAuthor($author)
    {
        $this->author = $author;
        return $this;
    }

    /**
     * Get author
     *
     * @return collection $author
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return self
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * Get title
     *
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set year
     *
     * @param int $year
     * @return self
     */
    public function setYear($year)
    {
        $this->year = $year;
        return $this;
    }

    /**
     * Get year
     *
     * @return int $year
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Set bookTitle
     *
     * @param string $bookTitle
     * @return self
     */
    public function setBookTitle($bookTitle)
    {
        $this->bookTitle = $bookTitle;
        return $this;
    }

    /**
     * Get bookTitle
     *
     * @return string $bookTitle
     */
    public function getBookTitle()
    {
        return $this->bookTitle;
    }

    /**
     * Set crossref
     *
     * @param string $crossref
     * @return self
     */
    public function setCrossref($crossref)
    {
        $this->crossref = $crossref;
        return $this;
    }

    /**
     * Get crossref
     *
     * @return string $crossref
     */
    public function getCrossref()
    {
        return $this->crossref;
    }
}
