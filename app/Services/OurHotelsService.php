<?php

namespace App\Services;

use App\Contracts\Configs\SearchConfig;
use App\Contracts\Hotel;

class OurHotelsService {

    public function search(SearchConfig $config) {

        $active_providers = config('providers.providers');
        $combined_data = [];

        foreach ($active_providers as $name => $class) {
            $provider = new $class();
            $combined_data = array_merge($combined_data, $provider->search($config));
        }

        $combined_data = $this->sort($combined_data, 'rate_desc');

        return $combined_data;

    }

    private function sort($arr, $type) {
        usort($arr, array($this, 'callback_sort_' . $type));
        return $arr;
    }

    private function callback_sort_rate_desc(Hotel $a, Hotel $b) {
        return $a->getRate() < $b->getRate();
    }

    private function callback_sort_rate_asc(Hotel $a, Hotel $b) {
        return $a->getRate() > $b->getRate();
    }

}
