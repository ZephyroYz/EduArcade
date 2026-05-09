<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'status', 'response', 'admin_id', 'user_message', 'created_at', 'updated_at'
    ];

    protected $dates = ['created_at', 'updated_at'];

    // Relación con el usuario (emisor)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación con el administrador
    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
}
