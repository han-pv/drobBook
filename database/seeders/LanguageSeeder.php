<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $languages = [
            'Turkmen',
            'English',
            'Russian',
            'Turkish',
            'German',
        ];

        foreach ($languages as $language) {
            Language::create([
                'name' => $language
            ]);
        }
    }
}
