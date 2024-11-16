<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

     // semua akun seeder sudah saya ubah credentialnya, silahkan coba saja di website deploy saya
     // akun seeder ini cuman untuk local host.
    public function run()
    {
        User::factory()->count(10)->create();
    }
}
