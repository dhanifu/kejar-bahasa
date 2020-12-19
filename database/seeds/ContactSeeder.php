<?php

use Illuminate\Database\Seeder;
use App\Contact;
class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Contact::create([
            'email' => 'management@kejarbahasa.com',
            'no_tlp' => '081314151617',
            'instagram' => 'kejarbahasa',
            'facebook' => 'kejarbahasa',
            'twitter' => 'kejarbahasa'
        ]);
    }
}
