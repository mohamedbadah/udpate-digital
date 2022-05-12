<?php

namespace App\Models;

use App\Models\Room;
use App\Models\Weak;
use Carbon\Traits\Week;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Collage_time extends Model
{
    use HasFactory;
    public function day()
    {
        return $this->belongsTo(Weak::class, 'week_id', 'id');
    }
    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id', 'id');
    }
}
