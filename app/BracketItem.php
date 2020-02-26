<?php

namespace App;

use App\Models\Concerns\HasUUID;
use Illuminate\Database\Eloquent\Model;

class BracketItem extends Model
{
    use HasUUID;

    protected $fillable = [
        "round", "row", 'gametime', 'bracket_id'
    ];

    public function bracket () {
        return $this->belongsTo(Bracket::class);
    }

    public function team () {
        return $this->belongsTo(Team::class);
    }
}
