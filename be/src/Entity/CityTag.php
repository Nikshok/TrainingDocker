<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * CityTag
 *
 * @ORM\Table(name="city_tag")
 * @ORM\Entity
 */
class CityTag
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    private $title;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="CityOrganization", mappedBy="tag")
     */
    private $organization;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->organization = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return Collection|CityOrganization[]
     */
    public function getOrganization(): Collection
    {
        return $this->organization;
    }

    public function addOrganization(CityOrganization $organization): self
    {
        if (!$this->organization->contains($organization)) {
            $this->organization[] = $organization;
            $organization->addTag($this);
        }

        return $this;
    }

    public function removeOrganization(CityOrganization $organization): self
    {
        if ($this->organization->contains($organization)) {
            $this->organization->removeElement($organization);
            $organization->removeTag($this);
        }

        return $this;
    }

}

