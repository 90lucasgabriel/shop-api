<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AdminCouponRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules(){
        return [
            'code'          => 'required',
            'value'         => 'required'
        ];
    }
}
