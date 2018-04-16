<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class BasicPageAccessTests extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     * @throws \Throwable
     */
    public function testCanOpenHomePage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')->assertSee('Blogs by date');
        });
    }

    /**
     * @throws \Throwable
     */
    public function testCanOpenAboutPage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/About')->assertSee('About Rob Anthony');
        });
    }

    /**
     * @throws \Throwable
     */
    public function testCanOpenWorkPage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/Work')->assertSee('Portfolio');
        });
    }

    /**
     * @throws \Throwable
     */
    public function testCanOpenContactPage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/Contact')->assertSee('Contact');
        });
    }

    public function testCanOpenBlogPage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/home')->assertSee('Blogs by date');
        });
    }

    public function testGuestCanNotOpenBlogEdit()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/blog/edit/1')->assertPathIs('/login');
        });
    }

    public function testGuestCanNotOpenCategoryIndex()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/category/index')->assertPathIs('/login');
        });
    }

    public function testGuestCanNotOpenCategoryEdit()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/category/update')->assertPathIs('/home');
        });
    }

    public function testGuestCanNotOpenCategoryDelete()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/category/delete')->assertPathIs('/home');
        });
    }

    public function testGuestCanNotOpenCategoryStore()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/category/store')->assertPathIs('/home');
        });
    }
}