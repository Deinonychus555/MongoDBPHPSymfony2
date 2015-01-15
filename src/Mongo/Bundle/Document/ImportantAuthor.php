<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Mongo\Bundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Mongo\Bundle\Document\Author;

/**
 * Description of ImportantAuthors
 *
 * @author Javier
 */

/**
 * @MongoDB\Document(collection="ImportantAuthors")
 */
class ImportantAuthor extends Author {

    public function __construct(Author $author) {
        $this->id = $author->id;
        $this->articles = $author->articles;
        $this->books = $author->books;
        $this->incollections = $author->incollections;
        $this->inproceedings = $author->inproceedings;
        $this->max_year = $author->getMaxYear();
        $this->min_year = $author->getMinYear();
        $this->name = $author->name;
    }

}
