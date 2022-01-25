<?php

namespace App\Models;

use App\Models\View;
use App\Models\Module;
use App\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lesson extends Model
{
    use HasFactory, UuidTrait;

    public $incrementing = false;
    protected $keyType = 'uuid';
    
    protected $fillable = [
        'name',
        'description',
        'video'
    ];

    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    public function views()
    {
        return $this->hasMany(View::class)
                    ->where(function ($query) {
                        if (auth()->check()) {
                            return $query->where('user_id', auth()->user()->id);
                        }
                    });
    }
}
