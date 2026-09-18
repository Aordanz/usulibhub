<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\News;
use App\Models\Room;
use App\Models\RoomReservation;
use App\Models\User;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function dashboard(): View
    {
        $stats = [
            'total_users' => User::where('role', 'mahasiswa')->count(),
            'total_rooms' => Room::where('is_active', true)->count(),
            'reservations_today' => RoomReservation::whereDate('reservation_date', today())->count(),
            'unread_messages' => ContactMessage::where('status', 'pending')->count(),
            'pending_reservations' => RoomReservation::where('status', 'pending')->count(),
            'total_news' => News::where('is_published', true)->count(),
        ];

        $latestReservations = RoomReservation::with(['user', 'roomUnit.room'])
            ->latest()
            ->take(5)
            ->get();

        $latestUsers = User::where('role', 'mahasiswa')
            ->latest()
            ->take(5)
            ->get();

        $latestMessages = ContactMessage::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'stats',
            'latestReservations',
            'latestUsers',
            'latestMessages',
        ));
    }
}
