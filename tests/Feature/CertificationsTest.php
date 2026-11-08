<?php

namespace Tests\Feature;

use Tests\TestCase;

class CertificationsTest extends TestCase
{
    public function test_home_page_shows_the_certification_dashboard_with_titles_and_images(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('id="certifications"', false);
        $response->assertSee('Certification dashboard');
        $response->assertSee('Startup Now Cordillera: Exploring Programs, Funding, and Opportunities for Aspiring Startups', false);
        $response->assertSee('Understanding Startups &amp; Getting Your Idea Ready for the Philippine Startup Challenge XI', false);
        $response->assertSee('Introduction to Modern AI');
        $response->assertSee('images/certificates/startup-now-cordillera-2026.jpg', false);
        $response->assertSee('images/certificates/startup-challenge-xi-webinar-2026.jpg', false);
        $response->assertSee('images/certificates/cisco-introduction-to-modern-ai-2026.jpg', false);
        $response->assertSee('View certificate');
        $response->assertSee('Download');
    }

    public function test_certifications_appear_before_projects_on_the_home_page(): void
    {
        $response = $this->get('/');

        $html = $response->getContent();
        $certifications = strpos($html, 'id="certifications"');
        $projects = strpos($html, 'id="projects"');

        $this->assertNotFalse($certifications);
        $this->assertNotFalse($projects);
        $this->assertLessThan($projects, $certifications);
    }

    public function test_dashboard_shows_the_certifications_panel(): void
    {
        $response = $this->get('/dashboard');

        $response->assertStatus(200);
        $response->assertSee('Certifications');
        $response->assertSee('Introduction to Modern AI');
        $response->assertSee('View certificate dashboard');
    }
}
