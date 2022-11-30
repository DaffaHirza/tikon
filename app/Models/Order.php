<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = [
        'user', 'tiket'
    ];
    public function user()
    {
        return $this -> belongsTo(User::class, 'customer_ID');
    }
    public function tiket()
    {
        return $this -> belongsTo(Tikon::class, 'ID_tiket');
    }
}
