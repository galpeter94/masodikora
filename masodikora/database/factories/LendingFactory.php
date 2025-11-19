<?php

namespace Database\Factories;

use App\Models\Copy;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lending>
 */
class LendingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::all()->random()->id,
            'copy_id'=>Copy::all()->random()->id,
            'start'=>fake()->date(),
            'end'=>fake()->date(),
            'warnings'=>rand(0,3),
        ];
    }

    public function myLendingsAtMe(){
        $user = Auth::user();
        $lending = DB::table('lendings as l')
        ->selectRaw("*")
        ->join("copies as c", "l.copy_id", "c.id")
        ->where("l.user_id", $user_id)
        ->whereNull("end")
        ->get();
    }

}
