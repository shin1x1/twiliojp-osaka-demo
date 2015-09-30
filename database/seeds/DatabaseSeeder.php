<?php

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        User::create([
            'name'     => 'twilio',
            'password' => Hash::make('m7n2PnRbY1nRgtRATWVm'),
        ]);

        Model::reguard();
    }
}
