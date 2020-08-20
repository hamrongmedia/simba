<?php

use Illuminate\Database\Seeder;

class Instagram extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $data = [
                [
                'id'=> 1,
                'id_user'=>'17841439579281710',
                'token'=>'IGQVJYTHN1V1JrdEpfRTRYYU5UcFJRa011dEFJRTB2MEdDUk5ya1J2QkZA0bGVjcVAyUW5DSFZAUNzQ2Tk1BZAzBsbk8xM1J4d3RuckpMZA00tWFUyblFXbnVoZA1l2aU9abnVhNjhqemVJZA3ZAyZA1AybzFNWgZDZD', 
                ],
            ];
        DB::table('db_instagram')->insert($data);
    }
}
