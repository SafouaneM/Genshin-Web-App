<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int                                         $id
 * @property string                                      $name
 * @property string|null                                 $vision
 * @property string|null                                 $weapon
 * @property string|null                                 $affiliation
 * @property int                                         $rarity
 * @property string                                      $nation
 * @property string|null                                 $constellation
 * @property string|null                                 $birthday
 * @property string                                      $description
 * @property string|null                                 $skillTalents
 * @property string|null                                 $passiveTalents
 * @property string|null                                 $constellations
 * @property string|null                                 $outfits
 * @property string|null                                 $icon
 * @property string|null                                 $portrait
 *
 **/

class Character extends Model
{
    use HasFactory;

    protected $casts = [
        'skillTalents' => 'json',
        'passiveTalents' => 'json',
        'constellations' => 'json',
        'outfits' => 'json'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class)
            ->withTimestamps()
            ->withPivot(['is_owned'])
            ->withPivot(['note'])
            ->withPivot(['constelation']);



    }



}
