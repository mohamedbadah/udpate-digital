<?php

namespace App\Models;

use App\Models\Room;
// use App\Models\Building;
use App\Models\Floor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Building extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'id'];

    public function floors()
    {
        return $this->hasMany(Floor::class, 'building_id', 'id');
    }
    public function room()
    {
        return $this->hasManyThrough(Floor::class, Room::class, 'building_id', 'floor_id');
    }
}
