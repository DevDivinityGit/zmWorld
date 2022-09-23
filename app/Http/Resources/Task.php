<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Task extends JsonResource
{
    protected $prop = 0;
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'category' => $this->category,
            'price' => $this->price,
            'status' => $this->pivot->task_status,
            'task_link' => $this->task_link,
            'user' => $this->userData,
            'demand' => $this->demand,
            'remaining' => $this->remaining,
            'image' => $this->image,
//            'user' => $this->users()->find(++$this->prop),


        ];
    }
}
