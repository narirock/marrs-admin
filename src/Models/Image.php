<?php

namespace Marrs\MarrsAdmin\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];
    public function imageable()
    {
        return $this->morphTo();
    }
}
