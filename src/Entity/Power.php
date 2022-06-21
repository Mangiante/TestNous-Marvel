<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Power
 *
 * @ORM\Table(name="power")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\PowerRepository")
 */
class Power
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
     * @ORM\Column(name="power", type="string", length=255, nullable=false)
     */
    private $power;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPower(): ?string
    {
        return $this->power;
    }

    public function setPower(string $power): self
    {
        $this->power = $power;

        return $this;
    }


}
