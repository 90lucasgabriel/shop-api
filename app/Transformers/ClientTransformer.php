<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Client;

/**
 * Class ClientTransformer
 * @package namespace App\Transformers;
 */
class ClientTransformer extends TransformerAbstract
{


    protected $defaultIncludes = ['user'];
    /**
     * Transform the \Client entity
     * @param \Client $model
     *
     * @return array
     */
    public function transform(Client $model)
    {
        return [
            'id'         => (int) $model->id,
            'phone'      => $model->phone,
            'address'    => $model->address,
            'city'       => $model->city,
            'state'      => $model->state,
            'zipcode'    => $model->zipcode,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }

    public function includeUser(Client $model){
        return $this->item($model->user, new UserTransformer());
    }
}
