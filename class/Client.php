<?php

class Client
{
    private string $_nom;
    private string $_prenom;
    private array $_reservation;

    public function __construct($nom, $prenom)
    {
        $this->_nom = $nom;
        $this->_prenom = $prenom;
        $this->_reservation = [];
    }

    public function setNom($nom)
    {
        $this->_nom = $nom;
    }

    public function setPrenom($prenom)
    {
        $this->_prenom = $prenom;
    }

    public function getNom()
    {
        return $this->_nom;
    }

    public function getPrenom()
    {
        return $this->_prenom;
    }

    public function addReservation(Reservation $reservation)
    {
        $this->_reservation[] = $reservation;
    }

    public function afficherReservation()
    {
        echo "<h4>Réservations de <strong>" . $this->getPrenom() . " " . strtoupper($this->getNom()) . "</strong></h4>";
        echo '<span class="badge rounded-pill text-bg-success">' . count($this->_reservation) . ' RÉSERVATIONS</span>';
        foreach ($this->_reservation as $reservation) {
            echo "<p><strong>Hotel : " . $reservation->getChambre()->getHotel()->getNom() . " **** " . $reservation->getChambre()->getHotel()->getVille() . "</strong> / " . $reservation->getChambre()->getNumero() . " (2 lits - " . $reservation->getChambre()->getPrix() . " € - Wifi : " . $reservation->getChambre()->wifiForClient() . ") du " . $reservation->getDebut() . " au " . $reservation->getFin() . "</p>";
        }
        echo "<p>Total : " . $this->calcReservation() . " €</p>";
    }

    public function cancelReservation(Reservation $reservation)
    {
        if (($key = array_search($reservation, $this->_reservation)) !== false) {
            unset($this->_reservation[$key]);
            $reservation->getChambre()->getHotel()->cancelReservation($reservation);
            foreach ($this->_reservation as $key) {
                $reservation->getChambre()->setEtat(true);
            }
        }
    }

    public function calcReservation()
    {
        $total = 0;
        foreach ($this->_reservation as $reservation) {
            $total += $reservation->getChambre()->getPrix() * $reservation->getDate();
        }
        return $total;
    }

    public function __toString()
    {
        return $this->getPrenom() . " " . strtoupper($this->getNom());
    }
}
