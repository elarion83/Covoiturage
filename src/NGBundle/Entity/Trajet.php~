<?php

namespace NGBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Trajet
 *
 * @ORM\Table(name="trajet")
 * @ORM\Entity(repositoryClass="NGBundle\Repository\TrajetRepository")
 */
class Trajet
{

    /**
   * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User")
   * @ORM\JoinColumn(nullable=false)
   */
  private $user;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="date")
     */
    private $created;

    /**
     * @var string
     *
     * @ORM\Column(name="ville_depart", type="string", length=255)
     */
    private $villeDepart;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_depart", type="date")
     */
    private $dateDepart;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_retour", type="date")
     */
    private $dateRetour;

    /**
     * @var bool
     *
     * @ORM\Column(name="possede_info", type="boolean")
     */
    private $possedeInfo;

    /**
     * @var bool
     *
     * @ORM\Column(name="aura_info", type="boolean")
     */
    private $auraInfo;

    /**
     * @var string
     *
     * @ORM\Column(name="cotisation", type="integer")
     */
    private $cotisation;

    /**
     * @var string
     *
     * @ORM\Column(name="nb_places", type="integer")
     */
    private $nbPlaces;



    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return Trajet
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    
    /**
     * Set villeDepart
     *
     * @param string $villeDepart
     *
     * @return Trajet
     */
    public function setVilleDepart($villeDepart)
    {
        $this->villeDepart = $villeDepart;

        return $this;
    }

    /**
     * Get villeDepart
     *
     * @return string
     */
    public function getVilleDepart()
    {
        return $this->villeDepart;
    }

    /**
     * Set dateDepart
     *
     * @param \DateTime $dateDepart
     *
     * @return Trajet
     */
    public function setDateDepart($dateDepart)
    {
        $this->dateDepart = $dateDepart;

        return $this;
    }

    /**
     * Get dateDepart
     *
     * @return \DateTime
     */
    public function getDateDepart()
    {
        return $this->dateDepart;
    }

    /**
     * Set dateRetour
     *
     * @param \DateTime $dateRetour
     *
     * @return Trajet
     */
    public function setDateRetour($dateRetour)
    {
        $this->dateRetour = $dateRetour;

        return $this;
    }

    /**
     * Get dateRetour
     *
     * @return \DateTime
     */
    public function getDateRetour()
    {
        return $this->dateRetour;
    }

    /**
     * Set possedeInfo
     *
     * @param boolean $possedeInfo
     *
     * @return Trajet
     */
    public function setPossedeInfo($possedeInfo)
    {
        $this->possedeInfo = $possedeInfo;

        return $this;
    }

    /**
     * Get possedeInfo
     *
     * @return bool
     */
    public function getPossedeInfo()
    {
        return $this->possedeInfo;
    }

    /**
     * Set auraInfo
     *
     * @param boolean $auraInfo
     *
     * @return Trajet
     */
    public function setAuraInfo($auraInfo)
    {
        $this->auraInfo = $auraInfo;

        return $this;
    }

    /**
     * Get auraInfo
     *
     * @return bool
     */
    public function getAuraInfo()
    {
        return $this->auraInfo;
    }

    /**
     * Set cotisation
     *
     * @param string $cotisation
     *
     * @return Trajet
     */
    public function setCotisation($cotisation)
    {
        $this->cotisation = $cotisation;

        return $this;
    }

    /**
     * Get cotisation
     *
     * @return string
     */
    public function getCotisation()
    {
        return $this->cotisation;
    }

    /**
     * Set nbPlaces
     *
     * @param string $nbPlaces
     *
     * @return Trajet
     */
    public function setNbPlaces($nbPlaces)
    {
        $this->nbPlaces = $nbPlaces;

        return $this;
    }

    /**
     * Get nbPlaces
     *
     * @return string
     */
    public function getNbPlaces()
    {
        return $this->nbPlaces;
    }


    /**
     * Set user
     *
     * @param \UserBundle\Entity\User $user
     *
     * @return Trajet
     */
    public function setUser(\UserBundle\Entity\User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \UserBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
