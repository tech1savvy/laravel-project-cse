<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    // Add this property to allow mass assignment
    protected $fillable = ['name', 'email', 'password'];
}
