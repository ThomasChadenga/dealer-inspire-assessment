<?php
namespace Tests\Unit;

use Tests\TestCase;
use App\Contact;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ContactsTest extends TestCase
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
        $this->assertDatabaseHas('contacts', ['email' => 'test@test.com']);
    }

}