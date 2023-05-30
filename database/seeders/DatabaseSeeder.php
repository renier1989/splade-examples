<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Tree;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        \App\Models\Post::factory(20)->create();

        /** Creo un padre */
        $parent = Tree::create([
            'title' => 'FENAFICHER ROOT'
        ]);

        /** Creo un hijo */
            $child = new Tree();
            $child->title = '1st Child';
            $child->appendTo($parent)->save();
                
                /** Creo un nieto */
                    $child2 = new Tree();
                    $child2->title = '1st Gran-Child';
                    $child2->appendTo($child)->save();


    }
}
