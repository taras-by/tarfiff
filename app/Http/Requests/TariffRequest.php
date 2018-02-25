<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TariffRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'filter' => [
                'json',
                function ($name, $value, $fail) {

                    $filter = json_decode($value);

                    if (isset($filter->keys)) {
                        if (is_array($filter->keys)) {
                            foreach ($filter->keys as $key) {
                                if (!is_string($key)) {
                                    $fail('filter.keys must be an array of strings');
                                }
                            }
                        } else {
                            $fail('filter.keys must be an array');
                        }
                    }
                },
                function ($name, $value, $fail) {

                    $filter = json_decode($value);

                    if (isset($filter->ids)) {
                        if (is_array($filter->ids)) {
                            foreach ($filter->ids as $id) {
                                if (!is_integer($id)) {
                                    $fail('filter.ids must be an array of integers');
                                }
                            }
                        } else {
                            $fail('filter.ids must be an array');
                        }
                    }
                }
            ],
        ];
    }
}
