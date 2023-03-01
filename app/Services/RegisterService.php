<?php


namespace App\Services;


use Illuminate\Support\Facades\Log;

class RegisterService
{
    public function identityCheck($newUser)
    {
        $RegisteredUsers = $this->getUsers();

        foreach ($RegisteredUsers as $user){
            if ($user['email'] == $newUser['email'] ){
                Log::info('Registration failed! Data:' . json_encode($newUser));
                return response()->json(['code' => '405' ,'msg'=> 'This email is already registered!']);
            }
        }
        Log::info('User successfully registered! Data:' . json_encode($newUser));
        return response()->json(['code' => '200' ,'msg'=> 'You have successfully registered!']);
    }

    public function getUsers()
    {
        return [
            1 => [
                'id' => 1,
                'first_name' => 'Сергей',
                'last_name' => 'Петров',
                'email' => 'sergo@gmail.com',
                'password' => '1111',
            ],
            2 => [
                'id' => 2,
                'first_name' => 'Анна',
                'last_name' => 'Панасенко',
                'email' => 'annapan@gmail.com',
                'password' => '2222',
            ],
            3 => [
                'id' => 3,
                'first_name' => 'Макс',
                'last_name' => 'Иванов',
                'email' => 'maks-ivan@gmail.com',
                'password' => '3333',
            ]
        ];
    }
}
