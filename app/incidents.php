<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class incidents extends Model
{
    protected $table = 'incidents';
    protected $fillable = [
        'severity',
        'category',
        'devices',
        'title',
        'stoptime',
        'status',
        'userid'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userid');
    }
}
