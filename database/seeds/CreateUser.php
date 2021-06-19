<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CreateUser extends Seeder
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
                'name'      => 'Pongpichan Niramitwasu',
                'email'     => 'psomyimproduct@gmail.com',
                'password'  => '1qazZAQ!',
            ],
            [
                'name'      => 'Nguan Testsystem',
                'email'     => 'aa@gmail.com',
                'password'  => '1qazZAQ!',
            ],
            [
                'name'      => 'Test System',
                'email'     => 'bb@gmail.com',
                'password'  => '1qazZAQ!',
            ],
        ];

        foreach ($data as $key => $value) {
            User::create([
                'name'      => $value['name'],
                'email'     => $value['email'],
                'password'  => Hash::make($value['password']),
            ]);
        }
    }
}
