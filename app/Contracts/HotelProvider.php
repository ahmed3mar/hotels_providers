<?php
namespace App\Contracts;

use App\Contracts\Configs\HotelConfig;
use App\Contracts\Configs\SearchConfig;

interface HotelProvider {

    /**
     * Send search data to provider and get results
     * @param SearchConfig $ourHotelsSearch
     * @return Hotel[]
     */
    public function search(SearchConfig $ourHotelsSearch): iterable;

    /**
     * Get the details of the hotel from provider
     * @param HotelConfig $hotelConfig
     * @return Hotel
     */
    public function details(HotelConfig $hotelConfig): Hotel;

}
