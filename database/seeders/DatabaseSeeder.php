<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        //開発環境（local（本番環境だったらprodaほにゃらら））だったら、
        if (config('app.env')=='local') {
            $this->call(MemoSeeder::class);
        }
        
    }
}
