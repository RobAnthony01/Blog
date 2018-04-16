<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use App\User;
use App\Category;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class test_category_page extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public
    function test_loggedinuser_can_access_category()
    {
        $this->browse(function (Browser $browser) {
            $browser->LoginAs(User::find(1))
                    ->visit('/category/index')
                    ->assertPathIs('/category/index');
        });
    }

    function test_add_category()
    {
        $this->browse(function (Browser $browser) {
            $browser->type('#category', 'AAABBBCCC')
                    ->click('#create-btn')
                    ->assertSee('AAABBBCCC');
        });
    }

    function test_edit_category()
    {
        $this->browse(function (Browser $browser) {
            $catid = Category::where('name', 'AAABBBCCC')->firstOrFail()->id;
            $browser->click('@Edit' . $catid)
                    ->clear('#name')
                    ->type('#name', 'AAAEEEFFF')
                    ->click('#btn-submit')
                    ->assertSee('AAAEEEFFF');
        });
    }

    function test_delete_category()
    {
        $this->browse(function (Browser $browser) {
            $catid = Category::where('name', 'AAAEEEFFF')->firstOrFail()->id;
            $browser->click('@Delete' . $catid)
                    ->click('#btn-submit')
                    ->assertDontSee('AAAEEEFFF');
        });
    }
}
