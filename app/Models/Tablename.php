<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tablename extends Model
{
    use HasFactory;
    
        protected $table = 'tablename'; // Your existing table name
        protected $primaryKey = 'id'; // Your primary key
        public $timestamps = false; // Set to false if you don’t have timestamp columns
    
}
