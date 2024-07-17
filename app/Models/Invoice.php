<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Invoice extends Model
{
    use HasFactory;
    use Notifiable;

    protected $fillable = ['amount', 'description', 'brand', 'invoice', 'customer_email', 'salesperson_email', 'designsutility_email' /* other fillable attributes */];

    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
    public function customer()
    {
        return $this->hasOne(Customer::class, 'id', 'customer_id');
    }

    public function service()
    {
        return $this->hasMany(InvoiceService::class,'invoice_id','id');
    }

    
}
