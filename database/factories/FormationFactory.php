<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class FormationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $td = collect(["td1", "td2", "td3"]);
        $tp = collect(["tp1", "tp2", "tp3"]);
        $promo = collect(["BUT1", "BUT2", "BUT3"]);
        $name = collect(["QLIO", "MMI", "GEII"]);
        $option = collect(["CN", "SCN", "DWEB"]);
        return [
            'promotion'=> $promo->random(),
            'name'=> $name->random(),
            'td'=> $td->random(),
            'tp'=> $td->random(),
            'option'=> $option->random(),
            'category'=> fake()->word(),
        ];
    }
}
