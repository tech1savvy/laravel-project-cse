<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'icon' => 'fa fa-code',
                'title' => 'Web Design',
                'description' => 'Professional web design services to create stunning, responsive, and user-friendly websites tailored to your business needs.',
                'button_text' => 'Learn More',
                'button_link' => 'https://hightech.com/services/web-design',
            ],
            [
                'icon' => 'fa fa-file-code',
                'title' => 'Web Development',
                'description' => 'Custom web development solutions using the latest technologies to build scalable and secure web applications.',
                'button_text' => 'Learn More',
                'button_link' => 'https://hightech.com/services/web-development',
            ],
            [
                'icon' => 'fa fa-external-link-alt',
                'title' => 'UI/UX Design',
                'description' => 'Innovative UI/UX design services focused on enhancing user experience and engagement across all platforms.',
                'button_text' => 'Learn More',
                'button_link' => 'https://hightech.com/services/ui-ux-design',
            ],
            [
                'icon' => 'fas fa-user-secret',
                'title' => 'Cybersecurity',
                'description' => 'Comprehensive cybersecurity solutions to protect your business from evolving digital threats and vulnerabilities.',
                'button_text' => 'Learn More',
                'button_link' => 'https://hightech.com/services/cybersecurity',
            ],
            [
                'icon' => 'fa fa-envelope-open',
                'title' => 'Digital Marketing',
                'description' => 'Strategic digital marketing services to boost your online presence and drive targeted traffic to your business.',
                'button_text' => 'Learn More',
                'button_link' => 'https://hightech.com/services/digital-marketing',
            ],
            [
                'icon' => 'fas fa-laptop',
                'title' => 'Programming',
                'description' => 'Expert programming services delivering custom software solutions to meet your unique business challenges.',
                'button_text' => 'Learn More',
                'button_link' => 'https://hightech.com/services/programming',
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
