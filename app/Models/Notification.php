<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function scopeOnlyUnread($query)
    {
        return $query->whereNull('read_at');
    }

    public function setTitleAttribute() {
        return 'Expiring Product Notification';

    }
}
