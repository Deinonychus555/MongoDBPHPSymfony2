<?php

namespace Mongo\Bundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * Description of Book
 *
 * @author Javier
 * @author Juan Antonio
 * @author Oscar
 */

/**
 * @MongoDB\Document(collection="Books")
 */
class Book {

    /**
     *
     * @MongoDB\Id
     */
    protected $id;

    /**
     * @MongoDB\Collection
     * @MongoDB\ReferenceMany(targetDocument="Author")
     */
    protected $author;

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
     * Get id
     *
     * @return id $id
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set editor
     *
     * @param collection $editor
     * @return self
     */
    public function setEditor($editor) {
        $this->editor = $editor;
        return $this;
    }

    /**
     * Get editor
     *
     * @return collection $editor
     */
    public function getEditor() {
        return $this->editor;
    }

    /**
     * Set author
     *
     * @param collection $author
     * @return self
     */
    public function setAuthor($author) {
        $this->author = $author;
        return $this;
    }

    /**
     * Get author
     *
     * @return collection $author
     */
    public function getAuthor() {
        return $this->author;
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

    public function __construct()
    {
        $this->author = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add author
     *
     * @param Mongo\Bundle\Document\Author $author
     */
    public function addAuthor(\Mongo\Bundle\Document\Author $author)
    {
        $this->author[] = $author;
    }

    /**
     * Remove author
     *
     * @param Mongo\Bundle\Document\Author $author
     */
    public function removeAuthor(\Mongo\Bundle\Document\Author $author)
    {
        $this->author->removeElement($author);
    }
}
