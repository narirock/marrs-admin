<?php

namespace Marrs\MarrsAdmin\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'email',
        'token'
    ];
}
