<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::oldest('id')->firstOrFail();
        $collaborators = User::where('id', '!=', $admin->id)->get();

        Project::factory(4)
            ->for($admin, 'creator')
            ->create()
            ->each(function (Project $project) use ($collaborators) {
                $project->participants()->attach($collaborators->random(3));
            });
    }
}
