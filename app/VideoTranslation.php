<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class VideoTranslation extends Model
{
    protected $fillable = [
        'video_id',
        'locale',
        'name',
        'description',
    ];

    public function video(): HasOne
    {
        return $this->hasOne(Video::class, 'id', 'video_id');
    }
}
