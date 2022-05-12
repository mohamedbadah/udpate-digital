<?php

namespace App\Models;

use App\Models\Room;
use App\Models\Collage_time;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Weak extends Model
{
    use HasFactory;
    public function collages()
    {
        return $this->hasMany(Collage_time::class, 'week_id', 'id');
    }
}
