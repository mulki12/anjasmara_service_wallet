<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Wallet extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'balance_wallet',
        'poin_wallet',
        'pin',
        'user_uuid'
    ];
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_uuid');
    }
}
