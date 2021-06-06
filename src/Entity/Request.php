<?php

namespace App\Entity;

use App\Repository\RequestRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RequestRepository::class)
 */
class Request
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $request_datetime;

    /**
     * @ORM\Column(type="date")
     */
    private $journey_date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $from_road;

    /**
     * @ORM\Column(type="decimal", precision=5, scale=0)
     */
    private $from_zip;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $to_road;

    /**
     * @ORM\Column(type="decimal", precision=5, scale=0)
     */
    private $to_zip;

    /**
     * @ORM\Column(type="time")
     */
    private $arrivalat_time;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $comments;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRequestDatetime(): ?\DateTimeInterface
    {
        return $this->request_datetime;
    }

    public function setRequestDatetime(\DateTimeInterface $request_datetime): self
    {
        $this->request_datetime = $request_datetime;

        return $this;
    }

    public function getJourneyDate(): ?\DateTimeInterface
    {
        return $this->journey_date;
    }

    public function setJourneyDate(\DateTimeInterface $journey_date): self
    {
        $this->journey_date = $journey_date;

        return $this;
    }

    public function getFromRoad(): ?string
    {
        return $this->from_road;
    }

    public function setFromRoad(string $from_road): self
    {
        $this->from_road = $from_road;

        return $this;
    }

    public function getFromZip(): ?string
    {
        return $this->from_zip;
    }

    public function setFromZip(string $from_zip): self
    {
        $this->from_zip = $from_zip;

        return $this;
    }

    public function getToRoad(): ?string
    {
        return $this->to_road;
    }

    public function setToRoad(string $to_road): self
    {
        $this->to_road = $to_road;

        return $this;
    }

    public function getToZip(): ?string
    {
        return $this->to_zip;
    }

    public function setToZip(string $to_zip): self
    {
        $this->to_zip = $to_zip;

        return $this;
    }

    public function getArrivalatTime(): ?\DateTimeInterface
    {
        return $this->arrivalat_time;
    }

    public function setArrivalatTime(\DateTimeInterface $arrivalat_time): self
    {
        $this->arrivalat_time = $arrivalat_time;

        return $this;
    }

    public function getComments(): ?string
    {
        return $this->comments;
    }

    public function setComments(string $comments): self
    {
        $this->comments = $comments;

        return $this;
    }
}