<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (empty(User::first())) {
            for ($i = 0; $i < 20; $i++) {
                $this->createUser();
            }
        }
    }

    private function createUser()
    {
        $name = Arr::random(['John', 'Charlie', 'Svetlana', 'Anna', 'Nikita']);

        $user = new User();
        $user->id = Str::uuid();
        $user->login = strtolower($name . '_' . Str::random(5));
        $user->name = $name;
        $user->save();
    }
}
