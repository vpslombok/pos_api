<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Password_resets extends Model
{
    use HasFactory;
    protected $table = 'password_resets';
    protected $fillable = ['email', 'token', 'created_at', 'expired_at'];
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}