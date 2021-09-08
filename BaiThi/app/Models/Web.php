<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Web extends Model
{
    use HasFactory, Notifiable;
    protected $table='posts';
    protected $fillable=[
        'product_code','name','price','avatar'
    ];
}
