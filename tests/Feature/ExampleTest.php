<?php

namespace Tests\Feature;

use App\Contact;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function contacts_table_is_searchable()
    {
        factory(Contact::class)->create(['name' => 'foo']);
        factory(Contact::class)->create(['name' => 'bar']);

        Livewire::test('contacts-table')
            ->assertSee('foo')
            ->assertSee('bar')
            ->set('search', 'foo')
            ->assertSee('foo')
            ->assertDontSee('bar');
    }
}
