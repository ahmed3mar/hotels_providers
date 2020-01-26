<?php
namespace App\Libraries\Providers;

use App\Contracts\Configs\HotelConfig;
use App\Contracts\Configs\SearchConfig;
use App\Contracts\Hotel;
use App\Contracts\HotelProvider as HotelProviderIdentifier;

use Faker\Factory as Faker;

class TopHotelsProvider extends HotelProvider implements HotelProviderIdentifier {

    /**
     * @param SearchConfig $ourHotelsSearch
     * @return Hotel[]
     */
    public function search(SearchConfig $ourHotelsSearch): iterable
    {

        /**
         * here we will get data from the provider
         * So!! let's make a simulation with faker
         */

        $provider_hotels = $this->faker(
            // We will not use it =D
            $ourHotelsSearch->getFromDate()->format('d-m-Y'),
            $ourHotelsSearch->getToDate()->format('d-m-Y'),
            $ourHotelsSearch->getCity(),
            $ourHotelsSearch->getAdults()
        );
        $hotels = [];

        foreach ($provider_hotels as $provider_hotel) {

            $fare = $provider_hotel['price'];
            if (isset($provider_hotel['discount']) && $provider_hotel['discount']) {
                $fare -= $provider_hotel['discount'];
            }

            $rate = sizeof(str_split($provider_hotel['rate']));

            $hotel = new Hotel();
            $hotel
                ->setProvider('top_hotels')
                ->setName($provider_hotel['hotelName'])
                ->setFare($fare)
                ->setRate($rate)
                ->setAmenities($provider_hotel['amenities'])
            ;

            $hotels[] = $hotel;
        }

        return $hotels;

    }

    private function faker($from, $to, $city, $adultsCount) {
        $faker = Faker::create();
        $hotels = [];
        foreach (range(1, rand(1, 9)) as $index) {
            $hotels[] = [
                'hotelName'     => $faker->name,
                'rate'          => implode('', array_map(function() { return '*'; }, range(1, rand(1, 5)))),
                'price'         => ($faker->numberBetween(1111, 999999)),
                'discount'      => $faker->randomElement([0, 10, 20, 30, 50]),
                'amenities'     => array_map(function() use ($faker) { return $faker->domainWord; }, range(1, rand(5, 20))),
            ];
        }
        return $hotels;
    }

    /**
     * @inheritDoc
     */
    public function details(HotelConfig $hotelConfig): Hotel
    {
        // TODO: Implement details() method.
    }
}
