<?php

class SearchTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->json('POST', '/CrazyHotel', [
            'name' => 'Sally',
        ])
            ->seeJson([
                'provider' => "best_hotels",
            ]);
    }
}
