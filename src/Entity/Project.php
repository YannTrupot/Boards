<?php


namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Project
 *
 * @ORM\Table(name="project", uniqueConstraints={@ORM\UniqueConstraint(name="projectName", columns={"name"})}, indexes={@ORM\Index(name="idOwner", columns={"idOwner"})})
 * @ORM\Entity
 */
class Project
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="descriptif", type="text", length=65535, nullable=false)
     */
    private $descriptif;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="startDate", type="date", nullable=false)
     */
    private $startdate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dueDate", type="date", nullable=false)
     */
    private $duedate;

    /**
     * @var \Developer
     *
     * @ORM\ManyToOne(targetEntity="Developer")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idOwner", referencedColumnName="id")
     * })
     */
    private $owner;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Story", mappedBy="project")
     */
    private $stories;

    public function __construct(){
        $this->stories=new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getDescriptif(): string
    {
        return $this->descriptif;
    }

    /**
     * @return \DateTime
     */
    public function getStartdate(): \DateTime
    {
        return $this->startdate;
    }

    /**
     * @return \DateTime
     */
    public function getDuedate(): \DateTime
    {
        return $this->duedate;
    }

    /**
     * @return \Developer
     */
    public function getOwner(): \Developer
    {
        return $this->owner;
    }

    /**
     * @return mixed
     */
    public function getStories()
    {
        return $this->stories;
    }

    
}