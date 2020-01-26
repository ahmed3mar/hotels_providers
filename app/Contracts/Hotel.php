<?php
namespace App\Contracts;

class Hotel {

    /**
     * @var string The owner provider of the hotel
     */
    public $provider;

    /**
     * @var string Hotel name
     */
    public $hotelName;

    /**
     * @var float fare per night
     */
    public $fare;

    /**
     * @var int hotel rate
     */
    private $rate;

    /**
     * @var string[]
     */
    public $amenities;

    public function getHotel() : array {
        return [
            'provider'  => $this->getProvider(),
            'hotelName' => $this->getName(),
            'fare'      => $this->getFare(),
            'amenities' => $this->getAmenities(),
        ];
    }

    /**
     * @return string
     */
    public function getProvider(): string
    {
        return $this->provider;
    }

    /**
     * @param string $provider
     * @return Hotel
     */
    public function setProvider(string $provider): Hotel
    {
        $this->provider = $provider;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->hotelName;
    }

    /**
     * @param string $name
     * @return Hotel
     */
    public function setName(string $name): Hotel
    {
        $this->hotelName = $name;
        return $this;
    }

    /**
     * @return float
     */
    public function getFare(): float
    {
        return $this->fare;
    }

    /**
     * @param float $fare
     * @return Hotel
     */
    public function setFare(float $fare): Hotel
    {
        $this->fare = $fare;
        return $this;
    }

    /**
     * @return string[]
     */
    public function getAmenities(): array
    {
        return $this->amenities;
    }

    /**
     * @param string[] $amenities
     * @return Hotel
     */
    public function setAmenities(array $amenities): Hotel
    {
        $this->amenities = $amenities;
        return $this;
    }

    /**
     * @return int
     */
    public function getRate(): int
    {
        return $this->rate;
    }

    /**
     * @param int $rate
     * @return Hotel
     */
    public function setRate(int $rate): Hotel
    {
        $this->rate = $rate;
        return $this;
    }

}
