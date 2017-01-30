<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AdminProductRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules(){
        return [
            'name'          => 'required|min:3',
            'description'   => 'required',
            'price'         => 'required',
            'category_id'   => 'required',
        ];
    }
}
