<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            "Frontend",
            "Backend",
            "Full-stack"

        ];

        foreach ($types as $type) {
            
            $newTypes = new Type();

            $newTypes->title = $type;
            $newTypes->description = $type;

            $newTypes->save();

        }

    }
}
