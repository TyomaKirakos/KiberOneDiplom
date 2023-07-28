<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Group;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        Group::factory()->create(
            ['name' => 'Kiber']);

         User::factory()->create(
             [
                 'surname' => 'Беликова',
                 'name' => 'Кристина',
                 'login' => 'admin',
                 'birthdate' => '1988-01-01',
                 'gender' => 'женский',
                 'money' => '0',
                 'role' => 'менеджер',
                 'group_id' => 1,
                 'contact' => 'Tg:@belikova',
                 'password' => Hash::make('admin'),
             ],
//             [
//                 'surname' => 'Иванов',
//                 'name' => 'Иван',
//                 'login' => 'ivanov1',
//                 'birthdate' => '2010-05-10',
//                 'gender' => 'мужской',
//                 'money' => '50',
//                 'role' => 'ученик',
//                 'group_id' => 2,
//                 'contact' => '+79998562315',
//                 'password' => Hash::make('qwerty12345'),
//             ],
         );
    }
}
