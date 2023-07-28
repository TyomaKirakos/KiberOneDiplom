<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
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
        ];
    }

//    /**
//     * Indicate that the model's email address should be unverified.
//     *
//     * @return static
//     */
//    public function unverified()
//    {
//        return $this->state(fn (array $attributes) => [
//            'email_verified_at' => null,
//        ]);
//    }
}
