<?php

namespace Tests\Feature;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ContactShareControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_share_contact()
    {

        [$user1, $user2]= User::factory(2)->create();

        $contact = Contact::factory()->createOne([
            'phone_number' => '123456789',
            'user_id' => $user1->id,
        ]);

        $response = $this->actingAs($user1)
            ->post(route('contact-shares.store'), [
            'contactEmail' => $contact->email,
            'userEmail' => $user2->email
            ]);

        $response->assertRedirect(route('home'));

        $this->assertDatabaseCount('contact_shares',1);
        $sharedContacts = $user2->sharedContacts()->first();

        $this->assertTrue($contact->is($sharedContacts));
    }
}
