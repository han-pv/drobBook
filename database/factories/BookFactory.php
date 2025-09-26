<?php

namespace Database\Factories;

use App\Models\Year;
use App\Models\Author;
use App\Models\Category;
use App\Models\Language;
use App\Models\Publisher;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categoryId = Category::inRandomOrder()->first();
        $authorId = Author::inRandomOrder()->first();
        $languageId = Language::inRandomOrder()->first();
        $publisherId = Publisher::inRandomOrder()->first();
        $yearId = Year::inRandomOrder()->first();

        $isDiscount = fake()->boolean(30); // true bolma ahtimallygy 30%
        return [
            'category_id' => $categoryId,
            'author_id' => $authorId,
            'language_id' => $languageId,
            'publisher_id' => $publisherId,
            'year_id' => $yearId,
            'title' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'price' => fake()->randomFloat(2, 50, 750),
            'is_discount' => $isDiscount,
            'discount_percent'=> $isDiscount ? fake()->numberBetween(1, 99) : 0,
            'image' => null,
            'barcode' => fake()->ean8(),
            'is_new' => fake()->boolean(20),
            'is_stock' => fake()->boolean(90)
        ];
    }
}
