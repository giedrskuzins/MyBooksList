<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
//use Doctrine\Common\Collections\ArrayCollection;
//use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BookRepository")
 * @ORM\Table(name="books")
 *
 */
class Book
{
	/**
     * @var int
     *
     * @ORM\Id
	 * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
	
	/**
     * @var string
     *
     * @ORM\Column(type="string")
     * 
     */
    private $title;
	
	/**
     * @var string
     *
     * @ORM\Column(type="string")
     * 
     */
    private $permitYear;
	
	/**
     * @var Genre
     *
     * @ORM\ManyToOne(
     *      targetEntity="Genre"
     * )
     * 
     */
    private $genre;
	
    /**
     * @var array
     *
     * @ORM\Column(type="array", nullable=true)
     * 
     */
    private $authors;

	


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Book
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set permitYear
     *
     * @param string $permitYear
     * @return Book
     */
    public function setPermitYear($permitYear)
    {
        $this->permitYear = $permitYear;

        return $this;
    }

    /**
     * Get permitYear
     *
     * @return string 
     */
    public function getPermitYear()
    {
        return $this->permitYear;
    }

    /**
     * Set authors
     *
     * @param array $authors
     * @return Book
     */
    public function setAuthors($authors)
    {
        $this->authors = $authors;

        return $this;
    }

    /**
     * Get authors
     *
     * @return array 
     */
    public function getAuthors()
    {
        return $this->authors;
    }

    /**
     * Set genre
     *
     * @param \AppBundle\Entity\Genre $genre
     * @return Book
     */
    public function setGenre(\AppBundle\Entity\Genre $genre = null)
    {
        $this->genre = $genre;

        return $this;
    }

    /**
     * Get genre
     *
     * @return \AppBundle\Entity\Genre 
     */
    public function getGenre()
    {
        return $this->genre;
    }
}
