<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Hobby extends Model
{
    use HasFactory;
    protected $fillable = ['task_id','hobby','active'];

    public function task()
    {
        return $this->belongsTo(Task::class);
    }
}
