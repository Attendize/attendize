<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\Event;
use Tests\TestCase;

class EventAttendeesTest extends TestCase
{
    public function test_event_attendees_are_displayed()
    {
        // Create organiser with account id = 1 to skip first run
        $organiser = factory(App\Models\Organiser::class)->create([
            'account_id' => 1
        ]);

        $event = factory(App\Models\Event::class)->create([
            'account_id' => $organiser->account_id,
        ]);

        $attendee = factory(App\Models\Attendee::class)->create([
            'account_id' => $organiser->account_id,
            'event_id' => $event->id,
            'first_name' => 'Test First Name',
            'last_name' => 'Test Last Name',
        ]);

        $this->actingAs($this->test_user)
            ->get(route('showEventAttendees', ['event_id' => $attendee->event->id]))
            ->assertSee('Attendees')
            ->assertSee('Test First Name')
            ->assertSee('Test Last Name');
    }
}
