<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\NoticiaModel;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\NoticiaModel>
 */
class NoticiaModelFactory extends Factory
{
    protected $model = NoticiaModel::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome_noticia_tbn' => fake()->name(),
            'conteudo_noticia_tbn' => fake()->text(),
        ];
    }
}
