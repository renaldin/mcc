<?php

namespace App\Broadcasting;

use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\DB;

class CustomDatabaseChannel
{
    public function send($notifiable, Notification $notification)
    {
        $data = $notification->toDatabase($notifiable);

        return DB::table('notifications')->insert([
            'id' => $notification->id,
            'type' => get_class($notification),
            'notifiable_type' => get_class($notifiable),
            'notifiable_id' => $notifiable->getKey(),
            'data' => json_encode($data),
            'reference_id' => $data['reference_id'] ?? null,
            'feature' => $data['feature'] ?? null,
            'user_id' => $data['user_id'] ?? null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
