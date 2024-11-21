<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Business extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = ['name', 'email', 'address', 'img']; 
    protected $table = 'businesses'; 
    protected $dates = ['deleted_at']; 
    public $timestamps = true; 

  
    public function locations()
    {
        return $this->hasMany(Location::class);
    }
  
    // File upload method
    public function uploadLogo($file)
    {
        return $file->store('logos', 'public');
    }

    // Example of a relationship
    // public function products()
    // {
    //     return $this->hasMany(Product::class);
    // }
}
