<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Flight
 *
 * @ORM\Table(name="flight")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FlightRepository")
 */
class Flight
{
    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Reservation", mappedBy="flight")
     */
    private $flights;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Terrain", inversedBy="departures")
     * @ORM\JoinColumn(nullable=false)
     */
    private $departure;


    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Reservation", inversedBy="arrivals")
     * @ORM\JoinColumn(nullable=false)
     */
    private $arrival;

    /**
     * @var int
     *
     * @ORM\Column(name="nbFreeSeats", type="smallint")
     */
    private $nbFreeSeats;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="takeOffTime", type="datetime")
     */
    private $takeOffTime;

    /**
     * @var float
     *
     * @ORM\Column(name="seatPrice", type="float")
     */
    private $seatPrice;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="publicationDate", type="datetime")
     */
    private $publicationDate;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Terrain", inversedBy="pilots")
     * @ORM\JoinColumn(nullable=false)
     */
    private $pilot;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\PlaneModel", inversedBy="planes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $plane;

    /**
     * @var bool
     *
     * @ORM\Column(name="wasDone", type="boolean")
     */
    private $wasDone;


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
     * Set departure
     *
     * @param string $departure
     *
     * @return Flight
     */
    public function setDeparture($departure)
    {
        $this->departure = $departure;

        return $this;
    }

    /**
     * Get departure
     *
     * @return string
     */
    public function getDeparture()
    {
        return $this->departure;
    }

    /**
     * Set arrival
     *
     * @param string $arrival
     *
     * @return Flight
     */
    public function setArrival($arrival)
    {
        $this->arrival = $arrival;

        return $this;
    }

    /**
     * Get arrival
     *
     * @return string
     */
    public function getArrival()
    {
        return $this->arrival;
    }

    /**
     * Set nbFreeSeats
     *
     * @param integer $nbFreeSeats
     *
     * @return Flight
     */
    public function setNbFreeSeats($nbFreeSeats)
    {
        $this->nbFreeSeats = $nbFreeSeats;

        return $this;
    }

    /**
     * Get nbFreeSeats
     *
     * @return int
     */
    public function getNbFreeSeats()
    {
        return $this->nbFreeSeats;
    }

    /**
     * Set takeOffTime
     *
     * @param \DateTime $takeOffTime
     *
     * @return Flight
     */
    public function setTakeOffTime($takeOffTime)
    {
        $this->takeOffTime = $takeOffTime;

        return $this;
    }

    /**
     * Get takeOffTime
     *
     * @return \DateTime
     */
    public function getTakeOffTime()
    {
        return $this->takeOffTime;
    }

    /**
     * Set seatPrice
     *
     * @param float $seatPrice
     *
     * @return Flight
     */
    public function setSeatPrice($seatPrice)
    {
        $this->seatPrice = $seatPrice;

        return $this;
    }

    /**
     * Get seatPrice
     *
     * @return float
     */
    public function getSeatPrice()
    {
        return $this->seatPrice;
    }

    /**
     * Set publicationDate
     *
     * @param \DateTime $publicationDate
     *
     * @return Flight
     */
    public function setPublicationDate($publicationDate)
    {
        $this->publicationDate = $publicationDate;

        return $this;
    }

    /**
     * Get publicationDate
     *
     * @return \DateTime
     */
    public function getPublicationDate()
    {
        return $this->publicationDate;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Flight
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set pilot
     *
     * @param string $pilot
     *
     * @return Flight
     */
    public function setPilot($pilot)
    {
        $this->pilot = $pilot;

        return $this;
    }

    /**
     * Get pilot
     *
     * @return string
     */
    public function getPilot()
    {
        return $this->pilot;
    }

    /**
     * Set plane
     *
     * @param string $plane
     *
     * @return Flight
     */
    public function setPlane($plane)
    {
        $this->plane = $plane;

        return $this;
    }

    /**
     * Get plane
     *
     * @return string
     */
    public function getPlane()
    {
        return $this->plane;
    }

    /**
     * Set wasDone
     *
     * @param boolean $wasDone
     *
     * @return Flight
     */
    public function setWasDone($wasDone)
    {
        $this->wasDone = $wasDone;

        return $this;
    }

    /**
     * Get wasDone
     *
     * @return bool
     */
    public function getWasDone()
    {
        return $this->wasDone;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->userFlights = new \Doctrine\Common\Collections\ArrayCollection();
        $this->seats = new \Doctrine\Common\Collections\ArrayCollection();
        $this->flights = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add userFlight
     *
     * @param \AppBundle\Entity\User $userFlight
     *
     * @return Flight
     */
    public function addUserFlight(\AppBundle\Entity\User $userFlight)
    {
        $this->userFlights[] = $userFlight;

        return $this;
    }

    /**
     * Remove userFlight
     *
     * @param \AppBundle\Entity\User $userFlight
     */
    public function removeUserFlight(\AppBundle\Entity\User $userFlight)
    {
        $this->userFlights->removeElement($userFlight);
    }

    /**
     * Get userFlights
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUserFlights()
    {
        return $this->userFlights;
    }

    /**
     * Add seat
     *
     * @param \AppBundle\Entity\Reservation $seat
     *
     * @return Flight
     */
    public function addSeat(\AppBundle\Entity\Reservation $seat)
    {
        $this->seats[] = $seat;

        return $this;
    }

    /**
     * Remove seat
     *
     * @param \AppBundle\Entity\Reservation $seat
     */
    public function removeSeat(\AppBundle\Entity\Reservation $seat)
    {
        $this->seats->removeElement($seat);
    }

    /**
     * Get seats
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSeats()
    {
        return $this->seats;
    }

    /**
     * Add flight
     *
     * @param \AppBundle\Entity\Flight $flight
     *
     * @return Flight
     */
    public function addFlight(\AppBundle\Entity\Flight $flight)
    {
        $this->flights[] = $flight;

        return $this;
    }

    /**
     * Remove flight
     *
     * @param \AppBundle\Entity\Flight $flight
     */
    public function removeFlight(\AppBundle\Entity\Flight $flight)
    {
        $this->flights->removeElement($flight);
    }

    /**
     * Get flights
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFlights()
    {
        return $this->flights;
    }

    /**
     * Set planes
     *
     * @param \AppBundle\Entity\PlaneModel $planes
     *
     * @return Flight
     */
    public function setPlanes(\AppBundle\Entity\PlaneModel $planes)
    {
        $this->planes = $planes;

        return $this;
    }

    /**
     * Get planes
     *
     * @return \AppBundle\Entity\PlaneModel
     */
    public function getPlanes()
    {
        return $this->planes;
    }
}
