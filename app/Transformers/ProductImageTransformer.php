<?php
namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\ProductImage;

class ProductImageTransformer extends TransformerAbstract
{

    public function transform(ProductImage $model)
    {
        return [
            'id'         => (int) $model->id,
            'product_id' => $model->product_id,
            'url'        => $model->url,
            'description'=> $model->description,
            'index'      => $model->index,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }


}