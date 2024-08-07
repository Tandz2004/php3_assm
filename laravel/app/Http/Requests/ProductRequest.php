<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'thumbnail' => ['nullable','image'],
            'author' => ['required', 'string', 'max:255'],
            'publisher' => ['required', 'string', 'max:255'],
            'publication' => ['date'],
            'price' => ['required', 'numeric'],
            'quantity' => ['required', 'numeric'],
        ];
    }

    public function messages(){
        return[
            'title.required' => 'Tiêu đề không được để trống',
            'title.string' => 'Tiêu đề phải là chuỗi',
            'title.max' => 'Tiêu đề không được quá 255 ký tự',
            'thumbnail.image' => 'Ảnh không được để trống',
            'author.required' => 'Tác giả không được để trống',
            'author.string' => 'Tác giả phải là chuỗi',
            'author.max' => 'Tác giả không được quá 255 ký tự',
            'publisher.required' => 'Nhà xuất bản không được để trống',
            'publisher.string' => 'Nhà xuất bản phải là chuỗi',
            'publisher.max' => 'Nhà xuất bản không được quá 255 ký tự',
            'publication.date' => 'Ngày xuất bản phải là ngày',
            'price.required' => 'Giá không được để trống',
            'price.numeric' => 'Giá phải là số',
            'quantity.required' => 'Số lượng không được để trống',
            'quantity.numeric' => 'Số lượng phải là số',
        ];
    }
}
