<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get(database_path('data/tasks.json'));
        $tasks = json_decode($json, true)['data'];

        foreach ($tasks as $task) {
            Task::create([
                'title' => $task['title'],
                'description' => $task['description'],
                'status' => $task['status'],
                'user_id' => 1,
                'created_at' => $task['created_at'],
                'updated_at' => $task['updated_at']
            ]);
        }
    }
}
