<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/***
 * @property int id
 * @property string uuid
 * @property string name
 * @property string description
 */
class Course extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function modules(): HasMany
    {
        return $this->hasMany(Module::class);
    }
}
