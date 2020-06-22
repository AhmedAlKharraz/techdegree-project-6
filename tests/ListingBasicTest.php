<?php

use PHPUnit\Framework\TestCase;

class ListingBasicTest extends TestCase
{

    /** @test */
    public function dataIsSet(){

        $this->expectException(Exception::class);
        $listing = new ListingBasic($data);

    }

    /** @test */
    function idIsSet()
    {
        $this->expectException(Exception::class);

        $data = ["id" => null];
        $listing = new ListingBasic($data);
    }

    /** @test */
    function titleIsSet()
    {
        $this->expectException(Exception::class);

        $data = ["title" => null];
        $listing = new ListingBasic($data);
    }

    /** @test */
    public function ensureObjectIsCreated(){

        $data = ["id" => 1, "title" => "test"];
        $listing = new ListingBasic($data);

        $this->assertIsObject($listing);

    }

    /** @test */
    public function getStatusReturnBasic(){

        $data = ["id" => 1, "title" => "title", "status" => "basic"];
        $listing = new ListingBasic($data);

        $this->assertEquals('basic', $listing->getStatus());

    }

    /** @test */
    public function getMethodForEachPropertyReturningTheExpected(){

        $data = ["id" => 1, "title" => "test", "website" => "http://www.test.com", "email" => "test@gmail.com", "twitter" => "test"];
        $listing = new ListingBasic($data);

        $this->assertEquals($data["id"], $listing->getId());
        $this->assertEquals($data["title"], $listing->getTitle());
        $this->assertEquals($data["website"], $listing->getWebsite());
        $this->assertEquals($data["email"], $listing->getEmail());
        $this->assertEquals($data["twitter"], $listing->getTwitter());

    }

    /** @test */
    public function toArrayMethodReturnArray(){

        $data = ["id" => 1, "title" => "test", "website" => "http://www.test.com", "email" => "test@gmail.com", "twitter" => "test"];
        $listing = new ListingBasic($data);

        $this->assertEquals(
            ["id" => 1, 
            "title" => "test", 
            "website" => "http://www.test.com", 
            "email" => "test@gmail.com", 
            "twitter" => "test", 
            "status" => "basic"], 
            $listing->toArray());

    }

    public function testNoImage()
    {
        $data = [
            'id' => 1,
            'title' => 'Test Title',
            'image' => '',
        ];
        $listing = new ListingBasic($data);
        $this->assertFalse($listing->getImage());

    }
    public function testFullPathImage()
    {
        $data = [
            'id' => 1,
            'title' => 'Test Title',
            'image' => 'https://www.cascadiaphp.com/images/logo.svg',
        ];
        $listing = new ListingBasic($data);
        $this->assertEquals($data['image'], $listing->getImage());

    }
    public function testBuildPathImage()
    {
        define('BASE_URL', '/');
        $data = [
            'id' => 1,
            'title' => 'Test Title',
            'image' => 'images/listings/1.png',
        ];
        $listing = new ListingBasic($data);
        $this->assertEquals(BASE_URL.'/'.$data['image'], $listing->getImage());
    }


}

?>