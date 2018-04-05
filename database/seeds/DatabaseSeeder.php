<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        function add_pivot($blog_id, $category_id)
        {
            DB::table('blog_category')->insert(
                [
                    'blog_id' => $blog_id,
                    'category_id' => $category_id,
                ]
            );
        }
        // $this->call(UsersTableSeeder::class);
        factory(App\User::class)->create();
        factory(App\Category::class, 10)->create();
        factory(App\Blog::class, 5)->create();

        add_pivot(1,2);
        add_pivot(1,3);
        add_pivot(1,8);
        add_pivot(2,3);
        add_pivot(2,7);
        add_pivot(2,9);
        add_pivot(3,2);
        add_pivot(3,1);
        add_pivot(4,2);
        add_pivot(4,9);
        add_pivot(5,2);

    }


}
