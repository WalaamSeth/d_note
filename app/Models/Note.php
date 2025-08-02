<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $table = 'notes';
    protected $fillable = [
        'section_id',
        'type',
        'content',
    ];
    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}
