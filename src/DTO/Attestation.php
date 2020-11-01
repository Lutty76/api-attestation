<?php
namespace App\DTO;

class Attestation
{
    /*'creation_date' => "31/10/2020",
    'creation_heures' => "18",
    'creation_minutes' => "38",
    'nom' => "Germond",
    'prenom' => "Jonathan",
    'naissance_date' => "01/01/1970",
    'naissance_lieu' => "Soupe primordiale",
    'adresse' => "22 rue du cherche midi, Île de Phatt",
    'zipcode' => "75900",
    'ville' => "Somewhere",
    'fait_date' => "31/10/2020",
    'fait_heures' => "15",
    'fait_minutes' => "00",
    'fait_lieu' => "Somewhere",
    'motif_travail' => "1",
    'motif_sante' => "1",
    'motif_famille' => "1",
    'motif_handicap' => "1",
    'motif_sport' => "1",
    'motif_judiciaire' => "1",
    'motif_missions' => "1",
    'motif_enfants' => "1",
    'motif_courses' => "1",
    'motifs_join' => "achats"*/

    private $creationDate;
    private $creationHeure;
    private $creationMinute;

    private $nom;
    private $prenom;
    private $adresse;
    private $codePostal;
    private $ville;
    private $dateNaissance;
    private $lieuNaissance;

    private $sortieDate;
    private $sortieHeure;
    private $sortieMinute;

    private bool $motifTravail;
    private bool $motifCourse;
    private bool $motifSante;
    private bool $motifFamille;
    private bool $motifHandicap;
    private bool $motifSport;
    private bool $motifJudiciaire;
    private bool $motifMissions;
    private bool $motifEnfants;

   

    public function __construct($creationDate, $creationHeure, $creationMinute, $nom, $prenom, $adresse, $codePostal, $ville, $dateNaissance, $lieuNaissance, $sortieDate, $sortieHeure, $sortieMinute, $motifTravail, $motifCourse, $motifSante, $motifFamille, $motifHandicap, $motifSport, $motifJudiciaire, $motifMissions, $motifEnfants)
    {
        $this->creationDate = $creationDate;
        $this->creationHeure = $creationHeure;
        $this->creationMinute = $creationMinute;

        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->adresse = $adresse;
        $this->codePostal = $codePostal;
        $this->ville = $ville;
        $this->dateNaissance = $dateNaissance;
        $this->lieuNaissance = $lieuNaissance;

        $this->sortieDate = $sortieDate;
        $this->sortieHeure = $sortieHeure;
        $this->sortieMinute = $sortieMinute;
        
        $this->motifTravail = $motifTravail;
        $this->motifCourse = $motifCourse;
        $this->motifSante = $motifSante;
        $this->motifFamille = $motifFamille;
        $this->motifHandicap = $motifHandicap;
        $this->motifSport = $motifSport;
        $this->motifJudiciaire = $motifJudiciaire;
        $this->motifMissions = $motifMissions;
        $this->motifEnfants = $motifEnfants;
    }

     



    /**
     * Get the value of creationDate
     */ 
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * Set the value of creationDate
     *
     * @return  self
     */ 
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    /**
     * Get the value of creationHeure
     */ 
    public function getCreationHeure()
    {
        return $this->creationHeure;
    }

    /**
     * Set the value of creationHeure
     *
     * @return  self
     */ 
    public function setCreationHeure($creationHeure)
    {
        $this->creationHeure = $creationHeure;

        return $this;
    }

    /**
     * Get the value of creationMinute
     */ 
    public function getCreationMinute()
    {
            return $this->creationMinute;
    }

    /**
     * Set the value of creationMinute
     *
     * @return  self
     */ 
    public function setCreationMinute($creationMinute)
    {
            $this->creationMinute = $creationMinute;

            return $this;
    }

    /**
     * Get the value of nom
     */ 
    public function getNom()
    {
            return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setNom($nom)
    {
            $this->nom = $nom;

            return $this;
    }

    /**
     * Get the value of prenom
     */ 
    public function getPrenom()
    {
            return $this->prenom;
    }

    /**
     * Set the value of prenom
     *
     * @return  self
     */ 
    public function setPrenom($prenom)
    {
            $this->prenom = $prenom;

            return $this;
    }

    /**
     * Get the value of adresse
     */ 
    public function getAdresse()
    {
            return $this->adresse;
    }

    /**
     * Set the value of adresse
     *
     * @return  self
     */ 

    public function setAdresse($adresse)
    {
            $this->adresse = $adresse;

            return $this;
    }

    /**
     * Get the value of codePostal
     */ 
    public function getCodePostal()
    {
            return $this->codePostal;
    }

    /**
     * Set the value of codePostal
     *
     * @return  self
     */ 
    public function setCodePostal($codePostal)
    {
            $this->codePostal = $codePostal;

            return $this;
    }

        /**
     * Get the value of ville
     */ 
    public function getVille()
    {
            return $this->ville;
    }

    /**
     * Set the value of ville
     *
     * @return  self
     */ 
    public function setVille($ville)
    {
            $this->ville = $ville;

            return $this;
    }

    /**
     * Get the value of dateNaissance
     */ 
    public function getDateNaissance()
    {
            return $this->dateNaissance;
    }

    /**
     * Set the value of dateNaissance
     *
     * @return  self
     */ 
    public function setDateNaissance($dateNaissance)
    {
            $this->dateNaissance = $dateNaissance;

            return $this;
    }

    /**
     * Get the value of lieuNaissance
     */ 
    public function getLieuNaissance()
    {
            return $this->lieuNaissance;
    }

    /**
     * Set the value of lieuNaissance
     *
     * @return  self
     */ 
    public function setLieuNaissance($lieuNaissance)
    {
            $this->lieuNaissance = $lieuNaissance;

            return $this;
    }

    /**
     * Get the value of sortieDate
     */ 
    public function getSortieDate()
    {
            return $this->sortieDate;
    }

    /**
     * Set the value of sortieDate
     *
     * @return  self
     */ 
    public function setSortieDate($sortieDate)
    {
            $this->sortieDate = $sortieDate;

            return $this;
    }

    /**
     * Get the value of sortieHeure
     */ 
    public function getSortieHeure()
    {
            return $this->sortieHeure;
    }

    /**
     * Set the value of sortieHeure
     *
     * @return  self
     */ 
    public function setSortieHeure($sortieHeure)
    {
            $this->sortieHeure = $sortieHeure;

            return $this;
    }

    /**
     * Get the value of sortieMinute
     */ 
    public function getSortieMinute()
    {
            return $this->sortieMinute;
    }

    /**
     * Set the value of sortieMinute
     *
     * @return  self
     */ 
    public function setSortieMinute($sortieMinute)
    {
            $this->sortieMinute = $sortieMinute;

            return $this;
    }

    /**
     * Get the value of motifTravail
     */ 
    public function getMotifTravail()
    {
            return $this->motifTravail;
    }

    /**
     * Set the value of motifTravail
     *
     * @return  self
     */ 
    public function setMotifTravail($motifTravail)
    {
            $this->motifTravail = $motifTravail;

            return $this;
    }

    /**
     * Get the value of motifCourse
     */ 
    public function getMotifCourse()
    {
            return $this->motifCourse;
    }

    /**
     * Set the value of motifCourse
     *
     * @return  self
     */ 
    public function setMotifCourse($motifCourse)
    {
            $this->motifCourse = $motifCourse;

            return $this;
    }

    /**
     * Get the value of motifSante
     */ 
    public function getMotifSante()
    {
            return $this->motifSante;
    }

    /**
     * Set the value of motifSante
     *
     * @return  self
     */ 
    public function setMotifSante($motifSante)
    {
            $this->motifSante = $motifSante;

            return $this;
    }

    /**
     * Get the value of motifFamille
     */ 
    public function getMotifFamille()
    {
            return $this->motifFamille;
    }

    /**
     * Set the value of motifFamille
     *
     * @return  self
     */ 
    public function setMotifFamille($motifFamille)
    {
            $this->motifFamille = $motifFamille;

            return $this;
    }



    /**
     * Get the value of motifHandicap
     */ 
    public function getMotifHandicap()
    {
            return $this->motifHandicap;
    }

    /**
     * Set the value of motifHandicap
     *
     * @return  self
     */ 
    public function setMotifHandicap($motifHandicap)
    {
            $this->motifHandicap = $motifHandicap;

            return $this;
    }

    /**
     * Get the value of motifSport
     */ 
    public function getMotifSport()
    {
            return $this->motifSport;
    }

    /**
     * Set the value of motifSport
     *
     * @return  self
     */ 
    public function setMotifSport($motifSport)
    {
            $this->motifSport = $motifSport;

            return $this;
    }

    /**
     * Get the value of motifJudiciaire
     */ 
    public function getMotifJudiciaire()
    {
            return $this->motifJudiciaire;
    }

    /**
     * Set the value of motifJudiciaire
     *
     * @return  self
     */ 
    public function setMotifJudiciare($motifJudiciaire)
    {
            $this->motifJudiciaire = $motifJudiciaire;

            return $this;
    }

    /**
     * Get the value of motifMissions
     */ 
    public function getMotifMissions()
    {
            return $this->motifMissions;
    }

    /**
     * Set the value of motifMissions
     *
     * @return  self
     */ 
    public function setMotifMissions($motifMissions)
    {
            $this->motifMissions = $motifMissions;

            return $this;
    }

    /**
     * Get the value of motifEnfants
     */ 
    public function getMotifEnfants()
    {
            return $this->motifEnfants;
    }

    /**
     * Set the value of motifEnfants
     *
     * @return  self
     */ 
    public function setMotifEnfants($motifEnfants)
    {
            $this->motifEnfants = $motifEnfants;

            return $this;
    }

    public function getListMotif(){

        $listMotif="";
        if ($this->motifTravail    === true) {   $listMotif.="travail, ";       }
        if ($this->motifCourse    === true) {   $listMotif.="achats, ";        }
        if ($this->motifSante      === true) {   $listMotif.="sante, ";         }
        if ($this->motifFamille    === true) {   $listMotif.="famille, ";       }
        if ($this->motifHandicap   === true) {   $listMotif.="handicap, ";      }
        if ($this->motifSport      === true) {   $listMotif.="sport_animaux, "; }
        if ($this->motifJudiciaire === true) {   $listMotif.="convocation, ";   }
        if ($this->motifMissions   === true) {   $listMotif.="missions, ";      }
        if ($this->motifEnfants    === true) {   $listMotif.="enfants, ";       }
        $listMotif = substr($listMotif, 0, -2);

        return $listMotif;
    }
}