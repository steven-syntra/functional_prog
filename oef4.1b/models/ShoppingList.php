<?php

class ShoppingList
{
    # eigenschappen of properties
    # zijn public, private of protected

    private $shop; # bevat een string, bv. "Zeeman"
    private $date; # bevat DateTime
    private $items = [];
    private $lengtevandenaam ;


    /**
     * @return mixed
     */
    public function getShop()
    {
        return $this->shop;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @return mixed
     */
    public function getDateString()
    {
        if ( $this->lengtevandenaam < 6 )
        {
            die("Sorry hoor, maar ik kan u de DateString niet geven als de naam korter is dan 6 tekens");
        }
        return $this->date->format("d/m/Y");
    }

    /**
     * @return array
     */
    public function getItems(): array
    {
        return $this->items;
    }


    # een methode is een function in een class
    public function setShop( $naam_winkel )
    {
        if(strlen($naam_winkel) < 4) die("Sorry, de naam moet minstens 3 karakters bevatten");

        $this->lengtevandenaam = strlen($naam_winkel);
        $this->shop = $naam_winkel;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date): void
    {
        $this->date = $date;
    }

    /**
     * @param array $items
     */
    public function setItems(array $items): void
    {
        $this->items = $items;
    }

    public function getAllTheProperties()
    {
        return [ $this->shop, $this->date, $this->items ];
    }

}