<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * HeroPower
 *
 * @ORM\Table(name="hero_power")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\HeroPowerRepository")
 */
class HeroPower
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
     * @var int
     *
     * @ORM\Column(name="power_id", type="integer", nullable=false)
     */
    private $powerId;

    /**
     * @var int
     *
     * @ORM\Column(name="hero_id", type="integer", nullable=false)
     */
    private $heroId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPowerId(): ?int
    {
        return $this->powerId;
    }

    public function setPowerId(int $powerId): self
    {
        $this->powerId = $powerId;

        return $this;
    }

    public function getHeroId(): ?int
    {
        return $this->heroId;
    }

    public function setHeroId(int $heroId): self
    {
        $this->heroId = $heroId;

        return $this;
    }


}
