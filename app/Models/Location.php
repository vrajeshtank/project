<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Location extends Model
{
    use HasFactory , SoftDeletes ;
    protected $fillable = ['name','business_name', 'email', 'address']; 
    protected $table = 'locations'; 
    public $timestamps = true; 
    protected $dates = ['deleted_at']; 

    public function business()
    {
        return $this->belongsTo(Business::class);
    }
}
