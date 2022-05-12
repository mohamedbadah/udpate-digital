<?php

namespace App\Models;

use App\Models\Room;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Floor extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'raspberry_pi_ip_address', 'building_id'];

    public function building()
    {
        return $this->belongsTo(Building::class);
    }
    public function rooms()
    {
        return $this->hasMany(Room::class, 'floor_id', 'id');
    }
    public function collage_time()
    {
        return $this->hasManyThrough(Room::class, Collage_time::class, 'floor_id', 'room_id');
    }
}
