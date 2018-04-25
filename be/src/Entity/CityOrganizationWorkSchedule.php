<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CityOrganizationWorkSchedule
 *
 * @ORM\Table(name="city_organization_work_schedule", indexes={@ORM\Index(name="IDX_63596DE032C8A3DE", columns={"organization_id"})})
 * @ORM\Entity
 */
class CityOrganizationWorkSchedule
{
    /**
     * @var integer
     *
     * @ORM\Column(name="day_of_week", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $dayOfWeek;

    /**
     * @var integer
     *
     * @ORM\Column(name="start", type="integer", nullable=false)
     */
    private $start;

    /**
     * @var integer
     *
     * @ORM\Column(name="finish", type="integer", nullable=false)
     */
    private $finish;

    /**
     * @var \CityOrganization
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="CityOrganization")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="organization_id", referencedColumnName="id")
     * })
     */
    private $organization;

    public function getDayOfWeek(): ?int
    {
        return $this->dayOfWeek;
    }

    public function getStart(): ?int
    {
        return $this->start;
    }

    public function setStart(int $start): self
    {
        $this->start = $start;

        return $this;
    }

    public function getFinish(): ?int
    {
        return $this->finish;
    }

    public function setFinish(int $finish): self
    {
        $this->finish = $finish;

        return $this;
    }

    public function getOrganization(): ?CityOrganization
    {
        return $this->organization;
    }

    public function setOrganization(?CityOrganization $organization): self
    {
        $this->organization = $organization;

        return $this;
    }


}

