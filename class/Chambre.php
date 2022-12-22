<?php

class Chambre
{
    private float $_prix;
    private bool $_wifi;
    private string $_numero;
    private bool $_etat;
    private Hotel $_hotel;
    private array $_reservation;

    public function __construct($numero, $prix, $wifi, $etat, Hotel $hotel)
    {
        $this->_numero = $numero;
        $this->_prix = $prix;
        $this->_wifi = $wifi;
        $this->_etat = $etat;
        $this->_hotel = $hotel;
        $hotel->addChambre($this);
        $this->_reservation = [];
    }

    public function setNumero($numero)
    {
        $this->_numero = $numero;
    }

    public function setPrix($prix)
    {
        $this->_prix = $prix;
    }

    public function setWifi($wifi)
    {
        $this->_wifi = $wifi;
    }

    public function setEtat($etat)
    {
        $this->_etat = $etat;
    }

    public function getNumero()
    {
        return $this->_numero;
    }

    public function getPrix()
    {
        return $this->_prix;
    }

    public function getWifi()
    {
        return $this->_wifi;
    }

    public function getEtat()
    {
        return $this->_etat;
    }

    public function getHotel()
    {
        return $this->_hotel;
    }

    public function statusWifi()
    {
        if ($this->getWifi() == true) {
            return '<i class="fa-solid fa-wifi"></i>';
        } else {
            return "";
        }
    }

    public function wifiForClient()
    {
        if ($this->getWifi() == true) {
            return "oui";
        } else {
            return "non";
        }
    }

    public function checkEtat()
    {
        if ($this->getEtat() == true) {
            return '<span class="badge rounded-pill text-bg-success">DISPONIBLE</span>';
        } else {
            return '<span class="badge rounded-pill text-bg-danger">RÉSERVÉE</span>';
        }
    }

    public function addReservation(Reservation $reservation)
    {
        if ($this->getEtat() == true) {
            $this->setEtat(false);
            $this->_reservation[] = $reservation;
        } else {
            $this->setEtat(true);
            unset($this->_reservation[$reservation]);
        }
    }

    public function afficherReservation()
    {
        foreach ($this->_reservation as $reservation) {
            echo '<p>' . $reservation . "</p>";
        }
    }

    public function __toString()
    {
        return $this->getNumero();
    }
}
