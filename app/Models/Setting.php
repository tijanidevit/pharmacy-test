<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\Notification;

class Setting extends Model
{
    use HasFactory, Notifiable;

    protected $guarded = ['id'];


    public function routeNotificationForVonage(Notification $notification): string
    {
        return $this->phone;
    }
}
