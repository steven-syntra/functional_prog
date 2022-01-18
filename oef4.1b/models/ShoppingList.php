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
     * @param $shop
     * @param $date
     * @param array $items
     */
    public function __construct( $p_shop, $p_date, array $p_items)
    {
        $this->setShop( $p_shop );
        $this->date = $p_date;
        $this->items = $p_items;
    }


    /**
     * @return string
     */
    public function getShop(): ?string
    {
        return $this->shop;
    }

    /**
     * @return DateTime
     */
    public function getDate(): ?DateTime
    {
        return $this->date;
    }

    /**
     * @return string
     */
    public function getDateString(): string
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
    public function setShop( $naam_winkel ): self
    {
        if(strlen($naam_winkel) < 4) die("Sorry, de naam moet minstens 3 karakters bevatten");

        $this->lengtevandenaam = strlen($naam_winkel);
        $this->shop = $naam_winkel;

        return $this;
    }

    /**
     * @param DateTime $date
     */
    public function setDate(DateTime $date): self
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @param array $items
     */
    public function setItems(array $items): self
    {
        $this->items = $items;

        return $this;
    }

    public function getAllTheProperties()
    {
        return [ $this->shop, $this->date, $this->items ];
    }

    public function empty(): self
    {
        $this->items = [];

        return $this;
    }

}