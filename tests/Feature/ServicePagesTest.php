<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ServicePagesTest extends TestCase
{
    use RefreshDatabase;

    protected bool $seed = true;

    public function test_homepage_returns_successful_response(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('Perpustakaan USU');
    }

    public function test_layanan_luring_page_returns_successful_response(): void
    {
        $response = $this->get('/layanan-luring');
        $response->assertStatus(200);
        $response->assertSee('Layanan Luring (Onsite)');
    }

    public function test_layanan_daring_page_returns_successful_response(): void
    {
        $response = $this->get('/layanan-daring');
        $response->assertStatus(200);
        $response->assertSee('Layanan Daring (Online)');
    }

    public function test_layanan_area_belajar_page_returns_successful_response(): void
    {
        $response = $this->get('/layanan-area-belajar');
        $response->assertStatus(200);
        $response->assertSee('Area Belajar &amp; Ruang Rapat', false);
    }

    public function test_jadwal_ruangan_page_returns_successful_response(): void
    {
        $response = $this->get('/jadwal-ruangan');
        $response->assertStatus(200);
        $response->assertSee('Ketersediaan Ruangan');
        $response->assertSee('Ruang Belajar Individu (RUBELIN)');
        $response->assertSee('Kubikel 01');
        $response->assertSee('09.00 - 14.30');
        $response->assertSee('Kubikel 05');
        $response->assertSee('Kalender & Jam Dipesan', false);
        $response->assertSee('Jam Pemakaian Ruangan');
        $response->assertSee('cal-dates-grid');
        $response->assertSee('cal-slots-container');
    }
}
