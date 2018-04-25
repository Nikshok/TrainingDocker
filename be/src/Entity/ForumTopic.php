<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ForumTopic
 *
 * @ORM\Table(name="forum_topic", indexes={@ORM\Index(name="IDX_853478CCD823E37A", columns={"section_id"})})
 * @ORM\Entity
 */
class ForumTopic
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
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime", nullable=false)
     */
    private $created;

    /**
     * @var \ForumSection
     *
     * @ORM\ManyToOne(targetEntity="ForumSection")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="section_id", referencedColumnName="id")
     * })
     */
    private $section;

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

    public function getCreated(): ?\DateTimeInterface
    {
        return $this->created;
    }

    public function setCreated(\DateTimeInterface $created): self
    {
        $this->created = $created;

        return $this;
    }

    public function getSection(): ?ForumSection
    {
        return $this->section;
    }

    public function setSection(?ForumSection $section): self
    {
        $this->section = $section;

        return $this;
    }


}

