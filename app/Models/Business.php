<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'address', 'img']; // Mass assignment protection
    protected $table = 'businesses'; // Custom table name (if needed)
    public $timestamps = true; // Enable timestamps

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
