<?php
namespace App\Contracts\Configs;

use Carbon\Carbon;

class SearchConfig {

    /**
     * @var Carbon Search start date
     */
    private $from_date;

    /**
     * @var Carbon Search end date
     */
    private $to_date;

    /**
     * @var String The target city
     */
    private $city;

    /**
     * @var int Number of adults
     */
    private $adults;

    /**
     * @return Carbon
     */
    public function getFromDate(): Carbon
    {
        return $this->from_date;
    }

    /**
     * @param Carbon $from_date
     * @return SearchConfig
     */
    public function setFromDate(Carbon $from_date): SearchConfig
    {
        $this->from_date = $from_date;
        return $this;
    }

    /**
     * @return Carbon
     */
    public function getToDate(): Carbon
    {
        return $this->to_date;
    }

    /**
     * @param Carbon $to_date
     * @return SearchConfig
     */
    public function setToDate(Carbon $to_date): SearchConfig
    {
        $this->to_date = $to_date;
        return $this;
    }

    /**
     * @return String
     */
    public function getCity(): String
    {
        return $this->city;
    }

    /**
     * @param String $city
     * @return SearchConfig
     */
    public function setCity(String $city): SearchConfig
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return int
     */
    public function getAdults(): int
    {
        return $this->adults;
    }

    /**
     * @param int $adults
     * @return SearchConfig
     */
    public function setAdults(int $adults): SearchConfig
    {
        $this->adults = $adults;
        return $this;
    }

}
