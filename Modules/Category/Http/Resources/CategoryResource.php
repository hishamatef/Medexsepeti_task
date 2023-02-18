<?php

namespace Modules\Category\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $parent = [];
        if(isset($this->category)){
            $parent['id'] = $this->category->id;
            $parent['name'] = $this->category->name;
        }
        return [
            'id' => $this->id,
            'slug' => $this->slug,
            'name' => $this->name,
            'category' =>$parent,
        ];
    }
}
