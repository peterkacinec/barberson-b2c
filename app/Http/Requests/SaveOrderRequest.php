<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required',
            'date' => 'required|date_format:Y-m-d',
//            'time' => 'required|date_format:H:i',
            'price' => 'required|numeric',
//            'promoCode' => 'nullable',
            'status' => 'required',
            'payment_type' => 'required',
            'provider_id' => 'required|numeric',
            'customer_address' => 'required',
            'selected_services' => 'required|array',
            'selected_services.*.title' => 'required',
            'selected_services.*.price' => 'required|numeric',
            'selected_services.*.currency' => 'required|in:EUR,todo', //todo doplnit meny
        ];
    }

    protected function prepareForValidation(): void
    {
        $selectedServices = $this->selectedServices;

        foreach ($this->selectedServices as $key => $v) {
            $selectedServices[$key]['title'] = $selectedServices[$key]['name'];
            unset($selectedServices[$key]['name']);
        }

        $this->merge([
            'payment_type' => $this->paymentType,
            'provider_id' => $this->providerId,
            'customer_address' => $this->customerAddress,
            'selected_services' => $selectedServices,
        ]);
    }
}
