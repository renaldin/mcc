<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    //

    public function fetch()
    {
        $userId = Session()->get('id_user');

        if (!$userId) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $user = User::find($userId);

        $latestNotification = $user->notifications()->latest()->first();

        $shouldPlaySound = false;

        if ($latestNotification && (
            !$user->last_seen_notification_at ||
            $latestNotification->created_at > $user->last_seen_notification_at
        )) {
            $shouldPlaySound = true;

            // Tandai bahwa user sudah melihat
            $user->last_seen_notification_at = now();
            $user->save();
        }

        return response()->json([
            'notifications' => $user->notifications()->limit(10)->get(),
            'shouldPlaySound' => $shouldPlaySound
        ]);
    }
}
