<?php

/**
 * Created By: JISHNU T K
 * Date: 2025/04/28
 * Time: 22:54:34
 * Description: StoreInvoiceRequest.php
 */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInvoiceRequest extends FormRequest
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
            'customer_name' => 'required',
            'customer_email' => 'required|email',
            'quantity' => 'required|integer|min:1',
            'amount' => 'required|numeric|min:0',
            'invoice_date' => 'required|date',
            'tax_percentage' => 'required',
            'file' => 'nullable|mimes:jpg,png,pdf|max:3072',
        ];
    }
}
