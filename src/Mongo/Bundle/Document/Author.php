<?php

namespace Mongo\Bundle\Document;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\MongoDB\Collection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Mongo\Bundle\Document\Article;

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
     * @MongoDB\ReferenceMany(targetDocument="Article", mappedBy="authors_id")
     */
    protected $articles = array();

    /**
     *
     * @MongoDB\ReferenceMany(targetDocument="Incollection", mappedBy="authors_id")
     */
    protected $incollections = array();

    /**
     * @MongoDB\ReferenceMany(targetDocument="Inproceeding", mappedBy="authors_id")
     */
    protected $inproceedings = array();

    /**
     * @MongoDB\ReferenceMany(targetDocument="Book", mappedBy="authors_id")
     */
    protected $books = array();

    /**
     *
     * @MongoDB\Int
     *
     */
    protected $min_year;

    /**
     * @MongoDB\Int
     */
    protected $max_year;

    public function getLengthList() {
        return (sizeof($this->incollections->toArray()) + sizeof($this->inproceedings->toArray()) + sizeof($this->articles->toArray()) + sizeof($this->books->toArray()));
    }

    public function getAge() {
        return ($this->max_year - $this->min_year);
    }

    public function getAnnual() {
        return ($this->getLengthList() / $this->getAge());
    }

    public function isInproductive() {
        return ($this->getAnnual() < 1);
    }

    public function isNobel() {
        return ($this->getAge() < 6);
    }

    public function isOccasional() {
        return ($this->getLengthList() < 5);
    }

    public function getAnnualJ() {
        $lengthJ = $this->getLengthJ();
        return ($lengthJ / $this->getAge());
    }

    public function isInadequate() {
        return ($this->getAnnualJ() < 0.5);
    }

    public function getLengthJ() {
        return sizeof($this->articles->toArray());
    }

    public function getLengthP() {
        return sizeof($this->inproceedings->toArray());
    }

    public function getRatioP() {
        return ($this->getLengthP() / $this->getLengthList()) * 100;
    }

    public function getRatioJ() {
        return ($this->getLengthJ() / $this->getLengthList()) * 100;
    }

    public function isTraveller() {
        return ($this->getRatioP() > $this->getRatioJ());
    }

    //Redactor
    public function isEditor() {
        return ($this->getRatioJ() > $this->getRatioP());
    }

    public function getSocial() {
        $grupal = 0;
        foreach ($this->articles as $article) {
            $grupal += $article->getLengthAuthors();
        }
        return ($grupal / $this->getLengthJ());
    }

    public function getCardinal() {
        $grupal = [];
        foreach ($this->articles as $article) {
            $grupal[] = $article->getLengthAuthors();
        }
        asort($grupal);
        $pos = (sizeof($grupal) + 1) / 2;
        return $grupal[$pos];
    }

    public function isSociable() {
        return ($this->getSocial() > $this->getCardinal());
    }

    public function isEstable() {
        return ($this->getSocial() < $this->getCardinal());
    }

    public function getArticlesByYear($year) {
        $contador = 0;
        foreach ($this->articles as $article) {
            if ($article->getYear() == $year) {
                $contador++;
            }
        }
        return $contador;
    }

    public function getInproceedingsByYear($year) {
        $contador = 0;
        foreach ($this->inproceedings as $inproceeding) {
            if ($inproceeding->getYear() == $year) {
                $contador++;
            }
        }
        return $contador;
    }

    public function __construct() {
        $this->articles = new \Doctrine\Common\Collections\ArrayCollection();
        $this->incollections = new \Doctrine\Common\Collections\ArrayCollection();
        $this->inproceedings = new \Doctrine\Common\Collections\ArrayCollection();
        $this->books = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Add article
     *
     * @param Mongo\Bundle\Document\Article $article
     */
    public function addArticle(\Mongo\Bundle\Document\Article $article) {
        $this->articles[] = $article;
    }

    /**
     * Remove article
     *
     * @param Mongo\Bundle\Document\Article $article
     */
    public function removeArticle(\Mongo\Bundle\Document\Article $article) {
        $this->articles->removeElement($article);
    }

    /**
     * Get articles
     *
     * @return Doctrine\Common\Collections\Collection $articles
     */
    public function getArticles() {
        return $this->articles;
    }

    /**
     * Add incollection
     *
     * @param Mongo\Bundle\Document\Incollection $incollection
     */
    public function addIncollection(\Mongo\Bundle\Document\Incollection $incollection) {
        $this->incollections[] = $incollection;
    }

    /**
     * Remove incollection
     *
     * @param Mongo\Bundle\Document\Incollection $incollection
     */
    public function removeIncollection(\Mongo\Bundle\Document\Incollection $incollection) {
        $this->incollections->removeElement($incollection);
    }

    /**
     * Get incollections
     *
     * @return Doctrine\Common\Collections\Collection $incollections
     */
    public function getIncollections() {
        return $this->incollections;
    }

    /**
     * Add inproceeding
     *
     * @param Mongo\Bundle\Document\Inproceeding $inproceeding
     */
    public function addInproceeding(\Mongo\Bundle\Document\Inproceeding $inproceeding) {
        $this->inproceedings[] = $inproceeding;
    }

    /**
     * Remove inproceeding
     *
     * @param Mongo\Bundle\Document\Inproceeding $inproceeding
     */
    public function removeInproceeding(\Mongo\Bundle\Document\Inproceeding $inproceeding) {
        $this->inproceedings->removeElement($inproceeding);
    }

    /**
     * Get inproceedings
     *
     * @return Doctrine\Common\Collections\Collection $inproceedings
     */
    public function getInproceedings() {
        return $this->inproceedings;
    }

    /**
     * Add book
     *
     * @param Mongo\Bundle\Document\Book $book
     */
    public function addBook(\Mongo\Bundle\Document\Book $book) {
        $this->books[] = $book;
    }

    /**
     * Remove book
     *
     * @param Mongo\Bundle\Document\Book $book
     */
    public function removeBook(\Mongo\Bundle\Document\Book $book) {
        $this->books->removeElement($book);
    }

    /**
     * Get books
     *
     * @return Doctrine\Common\Collections\Collection $books
     */
    public function getBooks() {
        return $this->books;
    }

    /**
     * Set minYear
     *
     * @param int $minYear
     * @return self
     */
    public function setMinYear($minYear) {
        $this->min_year = $minYear;
        return $this;
    }

    /**
     * Get minYear
     *
     * @return int $minYear
     */
    public function getMinYear() {
        return $this->min_year;
    }

    /**
     * Set maxYear
     *
     * @param int $maxYear
     * @return self
     */
    public function setMaxYear($maxYear) {
        $this->max_year = $maxYear;
        return $this;
    }

    /**
     * Get maxYear
     *
     * @return int $maxYear
     */
    public function getMaxYear() {
        return $this->max_year;
    }

}
