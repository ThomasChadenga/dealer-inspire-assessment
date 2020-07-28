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
        $user = factory('App\Contact')->create([
            'email' => 'test@test.com',
        ]);
        //act
        $response = $this->get('/' . $user->id);
        //assert
        $this->seeInDatabase('users', ['email' => 'test@test.com']);
    }

}