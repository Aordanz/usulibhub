<?php

namespace Tests\Feature;

use App\Models\RoomReservation;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminPagesTest extends TestCase
{
    use RefreshDatabase;

    protected bool $seed = true;

    private function loginAsAdmin(): User
    {
        $admin = User::factory()->create([
            'role' => 'admin',
            'nim_nip' => '999999999',
        ]);
        $this->actingAs($admin);

        return $admin;
    }

    public function test_admin_dashboard_loads(): void
    {
        $this->loginAsAdmin();

        $response = $this->get('/admin');
        $response->assertStatus(200);
        $response->assertSee('Dashboard');
        $response->assertSee('Total Pengguna');
        $response->assertSee('Ruangan Aktif');
        $response->assertSee('Reservasi Hari Ini');
    }

    public function test_admin_users_page_loads(): void
    {
        $this->loginAsAdmin();

        $response = $this->get('/admin/users');
        $response->assertStatus(200);
        $response->assertSee('Daftar Pengguna');
    }

    public function test_admin_rooms_page_loads(): void
    {
        $this->loginAsAdmin();

        $response = $this->get('/admin/rooms');
        $response->assertStatus(200);
        $response->assertSee('Kelola Ruangan');
    }

    public function test_admin_schedule_page_loads(): void
    {
        $this->loginAsAdmin();

        $response = $this->get('/admin/schedule');
        $response->assertStatus(200);
        $response->assertSee('Jadwal Ruangan');
        $response->assertSee('Status Slot Operasional Per-Ruangan');
    }

    public function test_admin_reservations_page_loads(): void
    {
        $this->loginAsAdmin();

        $response = $this->get('/admin/reservations');
        $response->assertStatus(200);
        $response->assertSee('Daftar Reservasi');
    }

    public function test_admin_history_page_loads(): void
    {
        $this->loginAsAdmin();

        $response = $this->get('/admin/history');
        $response->assertStatus(200);
        $response->assertSee('Histori Reservasi');
        $response->assertSee('Tabel Histori Peminjaman');
    }

    public function test_admin_can_approve_reservation(): void
    {
        $this->loginAsAdmin();

        $reservation = RoomReservation::where('status', 'pending')->first();
        if (! $reservation) {
            $this->markTestSkipped('No pending reservations in seeded data.');
        }

        $response = $this->patch("/admin/reservations/{$reservation->id}/approve");
        $response->assertRedirect();

        $this->assertDatabaseHas('room_reservations', [
            'id' => $reservation->id,
            'status' => 'approved',
        ]);
    }

    public function test_admin_can_reject_reservation(): void
    {
        $this->loginAsAdmin();

        $reservation = RoomReservation::where('status', 'pending')->first();
        if (! $reservation) {
            $this->markTestSkipped('No pending reservations in seeded data.');
        }

        $response = $this->patch("/admin/reservations/{$reservation->id}/reject", [
            'rejection_reason' => 'Ruangan sudah dipesan untuk kegiatan lain.',
        ]);
        $response->assertRedirect();

        $this->assertDatabaseHas('room_reservations', [
            'id' => $reservation->id,
            'status' => 'rejected',
            'rejection_reason' => 'Ruangan sudah dipesan untuk kegiatan lain.',
        ]);
    }

    public function test_guest_cannot_access_admin(): void
    {
        $response = $this->get('/admin');
        $response->assertRedirect('/login');
    }

    public function test_mahasiswa_cannot_access_admin(): void
    {
        $mahasiswa = User::where('role', 'mahasiswa')->first()
            ?? User::factory()->create(['role' => 'mahasiswa', 'nim_nip' => '888888888']);
        $this->actingAs($mahasiswa);

        $response = $this->get('/admin');
        $response->assertRedirect('/login');
    }
}
