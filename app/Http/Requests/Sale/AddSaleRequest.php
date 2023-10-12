<?php

namespace App\Http\Requests\Sale;

use Illuminate\Foundation\Http\FormRequest;
use App\Services\StockService;
use App\Models\Stock;

class AddSaleRequest extends FormRequest
{
    public function __construct(protected StockService $saleService) {
    }
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'sale_id' => 'required|exists:sales,id',
            'product_id' => 'required|exists:products,id',
            // 'quantity' => 'required|integer|min:1|max:'. $quantity,
            'quantity' => 'required|integer|min:1|max:'. $this->saleService->getByParam(['id' => $this->sale_id])->quantity,
        ];
    }

    public function messages() : array {
        return [
            'sale_id.exists' => 'Product not found',
            'quantity.max' => 'Quantity is more than the available quantity',
        ];
    }
}
