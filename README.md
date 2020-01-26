# Hotels Providers Search

## Get Started

First clone this repo and run

    composer install
    
Then run 

    php -S 0.0.0.0:8080 -t public
    
    
Then go to

    http://localhost:8080/CrazyHotel
    

## Basic Info

To add new provider simply with two steps.
- First: Create new php in `app/Libraries/Providers` for example `SampleProvider.php` which extends `HotelProvider` and implements `HotelProviderIdentifier`
and implement the methods

- **Second:** add the new provider in `config/providers.php` just simple HA!

---

There are another methods to handle multiple requests like sending search data to our api and then our api creates a session id and then trigger search to providers and return response to the user,
and then sending another request to our api with the `session id` to check if the data are retrieved and return with them.

Another method by using websocket and multi-threading and if any provider return with the data we will do a filter to it and send it to the user.
