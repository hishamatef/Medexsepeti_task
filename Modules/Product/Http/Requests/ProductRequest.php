<?php

namespace Modules\Product\Http\Requests;

use App\Enums\Discounts;
use App\Enums\Status;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
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
            'name'=>['required'],
            'category_id'=>['required', 'exists:categories,id'],
            'brand_id'=>['required', 'exists:brands,id'],
            'short_description' => 'nullable|string',
            'long_description' => 'nullable|string',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'views' => 'required|numeric',
            'discount' => 'nullable|numeric',
            'discount_type' => ['nullable','string',Rule::in([Discounts::FIXED,Discounts::PERCENT])],
            'discount_start_at' => "nullable|date|date_format:Y-m-d|after:yesterday",
            'discount_end_at' => "nullable|date|date_format:Y-m-d|after_or_equal:discount_start_at",
            'status' => ['nullable','string',Rule::in([Status::ACTIVE,Status::INACTIVE])],
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        if ($validator->fails()) {
            Log::channel('daily')->error(validationErrors($validator->errors()->all()));
            toastr()->error('public.error_create');
            return redirect()->route('products.create');
        }
    }
}
