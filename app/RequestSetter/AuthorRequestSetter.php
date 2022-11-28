<?php
namespace App\RequestSetter;

class AuthorRequestSetter
{
 
    /**
     * @var string 
     */
    private string $first_name;

    /**
     * @var string 
     */
    private string $last_name;

    /**
     * @var string 
     */
    private string $birthday = "2022-11-28T00:51:24.080Z";

    /**
     * @var string 
     */
    private string $biography;

    /**
     * @var string 
     */
    private string $gender;

   /**
     * @var string 
     */
    private string $place_of_birth;

 
    public function toArray(){
        return get_object_vars($this);
    }

    /**
     * Get the value of place_of_birth
     *
     * @return  string
     */ 
    public function getPlaceOfBirth()
    {
        return $this->place_of_birth;
    }

    /**
     * Set the value of place_of_birth
     *
     * @param  string  $place_of_birth
     *
     * @return  self
     */ 
    public function setPlaceOfBirth(string $place_of_birth)
    {
        $this->place_of_birth = $place_of_birth;

        return $this;
    }

    /**
     * Get the value of gender
     *
     * @return  string
     */ 
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set the value of gender
     *
     * @param  string  $gender
     *
     * @return  self
     */ 
    public function setGender(string $gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get the value of biography
     *
     * @return  string
     */ 
    public function getBiography()
    {
        return $this->biography;
    }

    /**
     * Set the value of biography
     *
     * @param  string  $biography
     *
     * @return  self
     */ 
    public function setBiography(string $biography)
    {
        $this->biography = $biography;

        return $this;
    }

    /**
     * Get the value of birthday
     *
     * @return  string
     */ 
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * Set the value of birthday
     *
     * @param  string  $birthday
     *
     * @return  self
     */ 
    public function setBirthday(string $birthday)
    {
        $this->birthday = $birthday;

        return $this;
    }

    /**
     * Get the value of last_name
     *
     * @return  string
     */ 
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * Set the value of last_name
     *
     * @param  string  $last_name
     *
     * @return  self
     */ 
    public function setLastName(string $last_name)
    {
        $this->last_name = $last_name;

        return $this;
    }

    /**
     * Get the value of first_name
     *
     * @return  string
     */ 
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * Set the value of first_name
     *
     * @param  string  $first_name
     *
     * @return  self
     */ 
    public function setFirstName(string $first_name)
    {
        $this->first_name = $first_name;

        return $this;
    }
}
