<?php
namespace Tests;

use Tests\TestCase;
use App\Contact;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class UsersTest extends TestCase
{
    use DatabaseMigrations;

    public function testSubmit() {
        //arrange
        $contact = factory('App\Contact')->create([
            'email' => 'test@test.com',
        ]);
        //act
        $response = $this->post('/contact/submit');
        //assert
        $this->seeInDatabase('contacts', ['email' => 'test@test.com']);
    }

}