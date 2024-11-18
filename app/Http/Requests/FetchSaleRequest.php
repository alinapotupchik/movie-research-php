<?php declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FetchSaleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'sold_at' => 'required|date|date_format:Y-m-d',
        ];
    }

    public function messages(): array
    {
        return [
            'sold_at.required' => 'The sale date is required.',
            'sold_at.date' => 'Please provide a valid date.',
            'sold_at.date_format' => 'The date format must be YYYY-MM-DD.',
        ];
    }

    public function getData(): array
    {
        return [
            'sold_at' => $this->input('sold_at'),
        ];
    }
}
