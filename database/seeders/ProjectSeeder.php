<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            [
                'title' => 'Web Design',
                'short_description' => 'Web Analysis',
                'image_path' => 'img/project-1.jpg',
                'category' => 'Web'
            ],
            [
                'title' => 'Cyber Security',
                'short_description' => 'Cyber Security Core',
                'image_path' => 'img/project-2.jpg',
                'category' => 'Security'
            ],
            [
                'title' => 'Mobile Info',
                'short_description' => 'Upcomming Phone',
                'image_path' => 'img/project-3.jpg',
                'category' => 'Mobile'
            ],
            [
                'title' => 'Web Development',
                'short_description' => 'Web Analysis',
                'image_path' => 'img/project-4.jpg',
                'category' => 'Development'
            ],
            [
                'title' => 'Digital Marketing',
                'short_description' => 'Marketing Analysis',
                'image_path' => 'img/project-5.jpg',
                'category' => 'Digital'
            ],
            [
                'title' => 'Keyword Research',
                'short_description' => 'Keyword Analysis',
                'image_path' => 'img/project-6.jpg',
                'category' => 'Research'
            ],
        ];
    
        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}
