<?php

class User
{
    private $id;
    private $voornaam;
    private $naam;
    private $email;
    private $telefoon;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getVoornaam()
    {
        return strtoupper( $this->voornaam );
    }

    /**
     * @param mixed $voornaam
     */
    public function setVoornaam($voornaam): void
    {
        $this->voornaam = $voornaam;
    }

    /**
     * @return mixed
     */
    public function getNaam()
    {
        return strtoupper( $this->naam );
    }

    /**
     * @param mixed $naam
     */
    public function setNaam($naam): void
    {
        $this->naam = $naam;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getTelefoon()
    {
        return $this->telefoon;
    }

    /**
     * @param mixed $telefoon
     */
    public function setTelefoon($telefoon): void
    {
        $this->telefoon = $telefoon;
    }


}