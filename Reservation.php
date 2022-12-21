<?php
class Reservation
{
    private string $_dateDebut;
    private string $_dateFin;
    private Client $_client;
    private Chambre $_chambre;

    public function __construct(Client $client, Chambre $chambre, $dateDebut, $dateFin)
    {
        $this->_client = $client;
        $this->_chambre = $chambre;
        $this->_dateDebut = $dateDebut;
        $this->_dateFin = $dateFin;
        $chambre->addReservation($this);
        $client->addReservation($this);
        $hotel = $chambre->getHotel();
        $hotel->addReservation($this);
    }

    public function setDebut($dateDebut)
    {
        $this->_dateDebut = $dateDebut;
    }

    public function setFin($dateFin)
    {
        $this->_dateFin = $dateFin;
    }

    public function getDebut()
    {
        return $this->_dateDebut;
    }

    public function getFin()
    {
        return $this->_dateFin;
    }

    public function getChambre()
    {
        return $this->_chambre;
    }

    public function getClient()
    {
        return $this->_client;
    }

    public function getDate()
    {
        $debut = new DateTime($this->getDebut());
        $fin = new DateTime($this->getFin());
        if ($this->getDebut() == $this->getFin()) {
            return 1;
        } else {
            $diff = $debut->diff($fin)->format("%d");
            $good = (int)$diff;
            return $good;
        }
    }

    public function __toString()
    {
        return "<p>" . $this->getClient() . " - " . $this->getChambre() . " - " . " du " . $this->getDebut() . " au " . $this->getFin() . "</p>";
    }
}
