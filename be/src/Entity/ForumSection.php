<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ForumSection
 *
 * @ORM\Table(name="forum_section", indexes={@ORM\Index(name="IDX_DCBF379E93635489", columns={"sub_forum_id"})})
 * @ORM\Entity
 */
class ForumSection
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
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @var \ForumSubForum
     *
     * @ORM\ManyToOne(targetEntity="ForumSubForum")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sub_forum_id", referencedColumnName="id")
     * })
     */
    private $subForum;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getSubForum(): ?ForumSubForum
    {
        return $this->subForum;
    }

    public function setSubForum(?ForumSubForum $subForum): self
    {
        $this->subForum = $subForum;

        return $this;
    }


}

