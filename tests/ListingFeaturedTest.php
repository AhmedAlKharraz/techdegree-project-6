<?php

use PHPUnit\Framework\TestCase;

class ListingFeaturedTest extends TestCase
{

    /** @test */
    public function getStatusReturnsFeatured(){

        $data = ["id" => 1, "title" => "test", "status" => "featured"];

        $listing = new ListingFeatured($data);
        $this->assertEquals("featured", $listing->getStatus());

    }

    /** @test */
    public function getCocReturnsExpectedResult(){

        $data = ["id" => 1, "title" => "test", "coc" => "coc"];

        $listing = new ListingFeatured($data);
        $this->assertEquals("coc", $listing->getCoc());

    }

}



?>