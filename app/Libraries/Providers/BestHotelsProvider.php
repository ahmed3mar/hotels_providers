<?php
namespace App\Libraries\Providers;

use App\Contracts\Configs\HotelConfig;
use App\Contracts\Configs\SearchConfig;
use App\Contracts\Hotel;
use App\Contracts\HotelProvider as HotelProviderIdentifier;

use Faker\Factory as Faker;

class BestHotelsProvider extends HotelProvider implements HotelProviderIdentifier {

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

            // We convert it to array to match our provider
            $amenities = explode(',' , $provider_hotel['roomAmenities']);

            $hotel = new Hotel();
            $hotel
                ->setProvider('best_hotels')
                ->setName($provider_hotel['hotel'])
                ->setFare($provider_hotel['hotelFare'])
                ->setRate($provider_hotel['hotelRate'])
                ->setAmenities($amenities);

            $hotels[] = $hotel;
        }

        return $hotels;

    }

    private function faker( $fromDate, $toDate, $city, $numberOfAdults ) {
        $faker = Faker::create();
        $hotels = [];
        foreach (range(1, rand(1, 9)) as $index) {
            $hotels[] = [
                'hotel'         => $faker->name,
                'hotelRate'     => rand(1, 5),
                'hotelFare'     => (float)($faker->numberBetween(1111, 999999) . "." . rand(11, 99)),
                'roomAmenities' => implode(',', array_map(function() use ($faker) { return $faker->domainWord; }, range(1, rand(5, 20)))),
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
