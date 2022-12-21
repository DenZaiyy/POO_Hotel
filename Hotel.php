<?php

class Hotel
{
    private string $_nom;
    private string $_adresse;
    private int $_postal;
    private string $_ville;
    private int $_nbChambre;
    private array $_chambres;
    private array $_reservation;

    public function __construct($nom, $adresse, $postal, $ville, $nbChambre)
    {
        $this->_nom = $nom;
        $this->_adresse = $adresse;
        $this->_postal = $postal;
        $this->_ville = $ville;
        $this->_nbChambre = $nbChambre;
        $this->_chambres = [];
        $this->_reservation = [];
    }

    public function setNom($nom)
    {
        $this->_nom = $nom;
    }

    public function setAdresse($adresse)
    {
        $this->_adresse = $adresse;
    }

    public function setPostal($postal)
    {
        $this->_postal = $postal;
    }

    public function setVille($ville)
    {
        $this->_ville = $ville;
    }

    public function setNbChambre($nbChambre)
    {
        $this->_nbChambre = $nbChambre;
    }

    public function getNom()
    {
        return $this->_nom;
    }

    public function getAdresse()
    {
        return $this->_adresse;
    }

    public function getPostal()
    {
        return $this->_postal;
    }

    public function getVille()
    {
        return $this->_ville;
    }

    public function getReservation()
    {
        return $this->_reservation = [];
    }

    public function getNbChambre()
    {
        return $this->_nbChambre;
    }

    public function addChambre(Chambre $chambre)
    {
        $this->_chambres[] = $chambre;
    }

    public function addReservation(Reservation $reservation)
    {
        $this->_reservation[] = $reservation;
    }

    public function cancelReservation(Reservation $reservation)
    {
        if (($key = array_search($reservation, $this->_reservation)) !== false) {
            unset($this->_reservation[$key]);
            foreach ($this->_reservation as $key) {
                $reservation->getChambre()->setEtat(true);
            }
        }
    }

    public function afficherChambres()
    {
        foreach ($this->_chambres as $chambre) {
            echo $chambre . '<br>';
        }
    }

    public function afficherReservation()
    {
        echo "<h4>Réservations de l'hôtel : <strong>" . $this->getNom() . " **** " . $this->getVille() . "</strong></h4>";
        if ($this->_reservation) {
            echo '<span class="badge rounded-pill text-bg-success">' . count($this->_reservation) . ' RÉSERVATIONS</span>';
            foreach ($this->_reservation as $reservation) {
                echo "<p>" . $reservation . "</p>";
            }
        } else {
            echo "<p>Aucune réservation !</p>";
        }
    }

    public function nbChambreReserver()
    {
        return count($this->_reservation);
    }

    public function calcChambreDispo()
    {
        $NBreserver = intval($this->nbChambreReserver());
        $NBchambres = intval($this->getNbChambre());
        $calc = $NBchambres - $NBreserver;
        return $calc;
    }

    public function afficherStatutHotel()
    {
        echo "<h4>Statuts des chambres de <strong>" . $this->getNom() . " **** " . $this->getVille() . "</strong></h4>";
        echo '<table class="table table-striped table-hover"><thead class="table-dark"><tr><th>Chambre</th><th>Prix</th><th>Wifi</th><th>Etat</th></tr></thead><tbody>';
        foreach ($this->_chambres as $chambre) {
            echo "<tr><td>" . $chambre->getNumero() . "</td><td>" . $chambre->getPrix() . " €</td><td>" . $chambre->statusWifi() . "</td><td>" . $chambre->checkEtat() . "</td></tr>";
        }
        echo "</tbody></table>";
    }

    public function __toString()
    {
        return "<h4><strong>" . $this->getNom() . " **** " . $this->getVille() . "</strong></h4><p>" . $this->getAdresse() . " " . $this->getPostal() . " " . strtoupper($this->getVille()) . "</p><p>Nombre de chambres : " . $this->getNbChambre() . "</p><p>Nombre de chambres réservées : " . $this->nbChambreReserver() . "</p><p>Nombre de chambre disponible : " . $this->calcChambreDispo() . "</p>";
    }
}
