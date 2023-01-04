<?php

namespace Tests\Feature;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContactControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_store_contacts()
    {
        $user = User::factory()->create();
        $contact = Contact::factory()->makeOne([
            'phone_number' => '123456789',
            'user_id' => $user->id,
        ]); //makeone lo crea en memoria pero no lo inserta en BD

        $response = $this->actingAs($user)->post(route('contacts.store'), $contact->getAttributes()); //con esto ya estás autenticado

        $response->assertRedirect(route('home'));

        $this->assertDatabaseCount('contacts',1);

        $this->assertDatabaseHas('contacts', [
            'user_id' => $user->id,
            'name' => $contact->name,
            'email' => $contact->email,
            'age' => $contact->age,
            'phone_number' => $contact->phone_number,
        ]);
    }

    /** @test */
    public function store_contact_validation()
    {
        $user = User::factory()->create();
        $contact = Contact::factory()->makeOne([
            'phone_number' => 'hola que tal',
            'email' => 'wrong email',
            'name' => null,
        ]);

        $response = $this->actingAs($user)->post(route('contacts.store'), $contact->getAttributes()); //con esto ya estás autenticado

        $response->assertSessionHasErrors(['phone_number', 'email','name']);

        $this->assertDatabaseCount('contacts',0);
    }

    /**
     * @test
     * @depends user_can_store_contacts
     */
    public function only_owner_can_update_or_delete_contact()
    {
        $this->withoutExceptionHandling();

        [$owner, $notOwner]= User::factory(2)->create();

        $contact = Contact::factory()->createOne([
            'phone_number' => '123456789',
            'user_id' => $owner->id,
        ]);

        $response = $this->actingAs($notOwner)->put(route('contacts.update', $contact->id), $contact->getAttributes()); //con esto ya estás autenticado

        $response->assertForbidden();

        $response = $this->actingAs($notOwner)->delete(route('contacts.destroy', $contact->id), $contact->getAttributes()); //con esto ya estás autenticado

        $response->assertForbidden();
    }
}
