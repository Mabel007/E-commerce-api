<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ProductCollection;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'description' => $this->detail,
            'price' => $this->price,
            'stock' => $this->stock == 0 ? 'Out Of Stock' : $this->stock,
            'discount' => $this->discount,
            'totalPrice' => round(( 1 - ($this->discount/100)) * $this->discount,2),
            'rating' => $this->reviews->count() > 0 ?round($this->reviews->sum('star')/$this->reviews->count(),1) : 'No Rating Yet',
            // 'href' => [
            //     'reviews' => route('reviews.index', $this->id)
            // ]

        ];
    }
}
