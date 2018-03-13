<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class NewsletterSubscriberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory(App\NewsletterSubscriber::class, 50)->create();
    }
}