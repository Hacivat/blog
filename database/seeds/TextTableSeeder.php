<?php

use Illuminate\Database\Seeder;

class TextTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Text::class, 50)->create()->each(function ($u) {
            $u->posts()->save(factory(App\Text::class)->make());
        });
    }
}
