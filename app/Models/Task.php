<?php

namespace App\Models;
use App\Models\Hobby;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = ['username'];

    public function hobbies()
    {
        return $this->hasMany(Hobby::class);
    }
}
 