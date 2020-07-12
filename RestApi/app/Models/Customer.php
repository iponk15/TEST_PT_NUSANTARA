<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public $timestamps    = false;
    protected $table      = 'customer';
    protected $primaryKey = 'customer_id';
    protected $fillable   = [
        'customer_name',
        'customer_email',
        'customer_password',
        'customer_gender',
        'customer_menkah',
        'customer_address'
    ];
}