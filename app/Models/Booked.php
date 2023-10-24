<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booked extends Model
{
    use HasFactory;

    protected $fillable = [
      'room_id', 'booked_name', 'booked_at'
    ];

    public function rooms() {
      return $this->hasMany(Room::class);
    }
}
