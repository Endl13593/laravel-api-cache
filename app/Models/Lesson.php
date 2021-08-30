<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property string uuid
 */
class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'module_id',
        'description',
        'video'
    ];

    public function module(): BelongsTo
    {
        return $this->belongsTo(Module::class);
    }
}
