<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationCotroller extends Controller
{
    /**
     * Maneja la notificación de un nuevo candidato.
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $notifications = Auth::user()->unreadNotifications;
        $notifications->markAsRead();
        return view('notifications.index', [
            'notifications' => $notifications
        ]);
    }
}
