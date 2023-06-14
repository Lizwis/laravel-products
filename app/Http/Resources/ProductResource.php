<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $products = [];
        foreach ($this->resource as $data) {

            $products[] = [
                'id' => $data->id,
                'name' => $data->name,
                'sku' => $data->sku,
                'price' => $data->price,
                'date' => Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at)->format('m/d/Y h:i:sa'),

            ];
        }

        return [
            'data' => $products,
            'links' => [
                'self' => $this->url($this->currentPage()),
                'next' => $this->nextPageUrl(),
                'prev' => $this->previousPageUrl(),
            ],
            'meta' => [
                'current_page' => $this->currentPage(),
                'last_page' => $this->lastPage(),
                'per_page' => $this->perPage(),
                'total' => $this->total(),
            ],
        ];
    }
}
