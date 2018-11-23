<?php

namespace App\Http\Requests;


class UserAddressRequest extends Request
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'province'      => 'required',
            'city'          => 'required',
            'district'      => 'required',
            'address'       => 'required',
            'zip'           => 'required',
            'contact_name'  => 'required',
            'contact_phone' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'province' => '省',
            'city' => '城市',
            'district' => '地区',
            'address' => '详细地址',
            'zip' => '邮政编码',
            'contact_name' => '联系人',
            'contact_phone' => '联系电话',
        ];
    }
}
