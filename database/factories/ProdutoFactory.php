<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Categoria;
use App\Models\User;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produto>
 */
class ProdutoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $nome = $this->faker->unique()->sentence();
        return [
            'nome' => $nome, // gera um fake de sentença unica para papular o banco
            'descricao' => $this->faker->text, // gera um fake de texto para papular o banco
            'preco' => $this->faker->randomNumber(2), // gera um numero randomico
            'slug' => Str::slug($nome), // define uma url, a partir da variavel nome
            'imagem' => $this->faker->imageUrl(400, 400),
            'id_user' => User::pluck('id')->random(), // extrai uma informação da tabela = id, randomico
            'id_categoria' => Categoria::pluck('id')->random(),

        ];
    }
}
