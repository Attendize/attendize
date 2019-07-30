<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\Organiser;
use Tests\TestCase;

class OrganiserCustomizeTest extends TestCase
{
    /**
     * @group passing
     */
    public function test_customize_organiser_is_successful()
    {
        $organiser = factory(App\Models\Organiser::class)->create();

        $this->actingAs($organiser)
            ->get(route('showOrganiserCustomize', ['organiser_id' => $organiser->id]))
            ->type($this->faker->name, 'name')
            ->type($this->faker->email, 'email')
            ->type($this->faker->word, 'facebook')
            ->type($this->faker->word, 'twitter')
            ->press('Save Organiser')
            ->assertJson(json_encode([
                'status' => 'success'
            ]));
    }
}
