<?php

namespace Potogan\TestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
// N'oubliez pas de rajouter ce << use >>, il définit le namespace pour
// les annotations de validation
use Symfony\Component\Validator\Constraints as Assert;

// On rajoute ce use pour le context :
use Symfony\Component\Validator\ExecutionContextInterface;

// On rajoute ce use pour la contrainte :
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Misd\PhoneNumberBundle\Validator\Constraints\PhoneNumber as AssertPhoneNumber;
/**
 * Conference
 *
 * @ORM\Table(name="conference")
 * @ORM\Entity(repositoryClass="Potogan\TestBundle\Repository\ConferenceRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Conference
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="Prenom", type="string", length=255)
     */
    private $prenom;

    /**
     * @var string
     *
     * 
     * @ORM\Column(name="Email", type="string", length=255, unique=true)
     * @Assert\Email(
     *     message = "L'email '{{ value }}' n'est pas un email valide.",
     *     checkMX = true
     * )
     * 
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="Mobile", type="string", length=255, unique=true)
     * @AssertPhoneNumber(message = "Le numéro de téléphone '{{ value }}' n'est pas un téléphone valide.", defaultRegion="FR")
     * 
     */
    private $mobile;

    /**
     * @var string
     *
     * @ORM\Column(name="Pseudonyme", type="string", length=255, nullable=true, unique=true)
     */
    private $pseudonyme;

    /**
     * @var string
     *
     * @ORM\Column(name="Twitter", type="string", length=255, nullable=true)
     */
    private $twitter;

    /**
     * @var string
     *
     * @ORM\Column(name="Facebook", type="string", length=255, nullable=true)
     */
    private $facebook;


    /**
    * @ORM\OneToOne(targetEntity="Potogan\TestBundle\Entity\Avatar", cascade={"persist", "remove"})
    * @Assert\Valid()
    */
    private $avatar;

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
     * Set nom
     *
     * @param string $nom
     *
     * @return Conference
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Conference
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Conference
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set mobile
     *
     * @param string $mobile
     *
     * @return Conference
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;

        return $this;
    }

    /**
     * Get mobile
     *
     * @return string
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * Set pseudonyme
     *
     * @param string $pseudonyme
     *
     * @return Conference
     */
    public function setPseudonyme($pseudonyme)
    {
        $this->pseudonyme = $pseudonyme;

        return $this;
    }

    /**
     * Get pseudonyme
     *
     * @return string
     */
    public function getPseudonyme()
    {
        return $this->pseudonyme;
    }

    /**
     * Set twitter
     *
     * @param string $twitter
     *
     * @return Conference
     */
    public function setTwitter($twitter)
    {
        $this->twitter = $twitter;

        return $this;
    }

    /**
     * Get twitter
     *
     * @return string
     */
    public function getTwitter()
    {
        return $this->twitter;
    }

    /**
     * Set facebook
     *
     * @param string $facebook
     *
     * @return Conference
     */
    public function setFacebook($facebook)
    {
        $this->facebook = $facebook;

        return $this;
    }

    /**
     * Get facebook
     *
     * @return string
     */
    public function getFacebook()
    {
        return $this->facebook;
    }

     /**
     * Set avatar
     *
     * @param \Potogan\testBundle\Entity\Avatar $avatar
     * @return Avatar
     */
    public function setAvatar(\Potogan\TestBundle\Entity\Avatar $avatar = null)
    {
        $this->avatar = $avatar;
    }

    /**
     * Get avatar
     *
     * @return \Potogan\TestBundle\Entity\Avatar 
     */
    public function getAvatar()
    {
        return $this->avatar;
    }
}

