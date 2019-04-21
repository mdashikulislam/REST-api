<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\Resource;

class ProductResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'description' => $this->detail,
            'stock' => $this->stock ==0 ? 'Out of Stock ':$this->stock,
            'discount' => $this->discount,
            'totalPrice' =>($this->price) -(($this->discount*$this->price)/100),
            'href' => [
                'link' =>route('product.show',$this->id)
            ]
        ];
    }
}
