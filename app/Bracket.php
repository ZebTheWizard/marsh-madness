<?php

namespace App;

use App\Models\Concerns\HasUUID;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;

class Bracket extends Model
{
    // use HasUUID;
    use Sluggable;
    use SluggableScopeHelpers;

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime'
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'fullTitle'
            ]
        ];
    }

    public function getFullTitleAttribute() {
        return strtolower("$this->gender $this->division " . $this->start_date->year);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected static function boot()
    {
        parent::boot();

        static::created(function ($bracket) {
            $rounds = log($bracket->seats, 2);
            for ($i=$rounds; $i >= 0; $i--) { 
                $seats = pow(2, $i);
                for ($j=0; $j < $seats; $j++) { 
                    BracketItem::create([
                        "round" => $rounds - $i,
                        "row" => $j,
                        'gametime' => $bracket->start_date,
                        "bracket_id" => $bracket->id,
                    ]);
                }
            }
            
        });
    }

    public function items () {
        return $this->hasMany(BracketItem::class);
    }
}
