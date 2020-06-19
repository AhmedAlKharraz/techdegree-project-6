<?php

use PHPUnit\Framework\TestCase;

class ListingPremiumTest extends TestCase
{

    /** @test */
    public function getStatusReturnsPremium(){

        $data = ["id" => 1, "title" => "test", "status" => "premium"];

        $listing = new ListingPremium($data);
        $this->assertEquals("premium", $listing->getStatus());

    }

    /** @test */
    public function getDescReturnsExpectedResult(){

        $data = ["id" => 1, "title" => "test", "description" => "test description"];

        $listing = new ListingPremium($data);
        $this->assertEquals("test description", $listing->getDescription());

    }

}



?>