<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Contracts\View\View;

class NotificationController extends Controller
{
    public function index() : View {
        $notifications = Notification::latest('id')->get();
        Notification::onlyUnread()->update(['read_at' => now()]);
        return view('admin.notifications.index', compact('notifications'));
    }
}
