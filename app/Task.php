<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded = [];


    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }


    public function users()
    {
        return $this->belongsToMany(User::class, 'user_task', 'task_id', 'user_id');
    }





}
