<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Faq;
class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Faq::create([
            'question' => 'What is nulla eu ipsum tempus est suscipit et vitae nulla?',
            'answer' => 'Nulla eu ipsum tempus est suscipit et vitae nulla. Once autet.Fusce rutrum quam a ultrices amet rhoncus. Nulla eu ipsum tempus est suscipit et vitae nulla.Once aute irure dolor.',
            'status' => 'active',
        ]);

        Faq::create([
            'question' => 'How much tempus est suscipit et vitae nulla?',
            'answer' => 'Nulla eu ipsum tempus est suscipit et vitae nulla. Once autet.Fusce rutrum quam a ultrices amet rhoncus. Nulla eu ipsum tempus est suscipit et vitae nulla.Once aute irure dolor.',
            'status' => 'active',
        ]);

        Faq::create([
            'question' => 'What happens if ipsum tempus est suscipit et vitae?',
            'answer' => 'Nulla eu ipsum tempus est suscipit et vitae nulla. Once autet.Fusce rutrum quam a ultrices amet rhoncus. Nulla eu ipsum tempus est suscipit et vitae nulla.Once aute irure dolor.',
            'status' => 'active',
        ]);

        Faq::create([
            'question' => 'What is nulla eu ipsum tempus est suscipit et vitae nulla?',
            'answer' => 'Nulla eu ipsum tempus est suscipit et vitae nulla. Once autet.Fusce rutrum quam a ultrices amet rhoncus. Nulla eu ipsum tempus est suscipit et vitae nulla.Once aute irure dolor.',
            'status' => 'active',
        ]);

        Faq::create([
            'question' => 'How much tempus est suscipit et vitae nulla?',
            'answer' => 'Nulla eu ipsum tempus est suscipit et vitae nulla. Once autet.Fusce rutrum quam a ultrices amet rhoncus. Nulla eu ipsum tempus est suscipit et vitae nulla.Once aute irure dolor.',
            'status' => 'active',
        ]);

        Faq::create([
            'question' => 'What happens if ipsum tempus est suscipit et vitae?',
            'answer' => 'Nulla eu ipsum tempus est suscipit et vitae nulla. Once autet.Fusce rutrum quam a ultrices amet rhoncus. Nulla eu ipsum tempus est suscipit et vitae nulla.Once aute irure dolor.',
            'status' => 'active',
        ]);
    }
}
