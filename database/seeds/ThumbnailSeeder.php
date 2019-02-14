<?php

use Illuminate\Database\Seeder;

class ThumbnailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Thumbnail::class, 20)->create();
    }
}
