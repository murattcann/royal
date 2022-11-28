<?php
namespace App\RequestSetter;

class BookRequestSetter
{

    /**
     * @var array
     */
    private array $author;
    
    /**
     * @var string 
     */
    private string $title;

    /**
     * @var string 
     */
    private string $isbn;

    /**
     * @var string 
     */
    private string $format;

    /**
     * @var string 
     */
    private string $release_date;

    /**
     * @var string 
     */
    private string $description;

    /**
     * @var int 
     */
    private int $number_of_pages=0;

    

    /**
     * Get the value of number_of_pages
     *
     * @return  int
     */ 
    public function getNumberOfPages()
    {
        return $this->number_of_pages;
    }

    /**
     * Set the value of number_of_pages
     *
     * @param  int  $number_of_pages
     *
     * @return  self
     */ 
    public function setNumberOfPages(int $number_of_pages)
    {
        $this->number_of_pages = $number_of_pages;

        return $this;
    }

    /**
     * Get the value of description
     *
     * @return  string
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @param  string  $description
     *
     * @return  self
     */ 
    public function setDescription(string $description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of release_date
     *
     * @return  string
     */ 
    public function getReleaseDate()
    {
        return $this->release_date;
    }

    /**
     * Set the value of release_date
     *
     * @param  string  $release_date
     *
     * @return  self
     */ 
    public function setReleaseDate(string $release_date)
    {
        $this->release_date = $release_date;

        return $this;
    }

    /**
     * Get the value of format
     *
     * @return  string
     */ 
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * Set the value of format
     *
     * @param  string  $format
     *
     * @return  self
     */ 
    public function setFormat(string $format)
    {
        $this->format = $format;

        return $this;
    }

    /**
     * Get the value of isbn
     *
     * @return  string
     */ 
    public function getIsbn()
    {
        return $this->isbn;
    }

    /**
     * Set the value of isbn
     *
     * @param  string  $isbn
     *
     * @return  self
     */ 
    public function setIsbn(string $isbn)
    {
        $this->isbn = $isbn;

        return $this;
    }

    /**
     * Get the value of title
     *
     * @return  string
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @param  string  $title
     *
     * @return  self
     */ 
    public function setTitle(string $title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of author
     *
     * @return  array
     */ 
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set the value of author
     *
     * @param  array  $author
     *
     * @return  self
     */ 
    public function setAuthor(array $author)
    {
        $this->author = $author;

        return $this;
    }

    public function toArray(){
        return get_object_vars($this);
    }
}
