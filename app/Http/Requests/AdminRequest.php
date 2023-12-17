<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
        if (request()->routeIs('admin.login')) {
            return [
                'name' => 'required|string|max:255',
                'password' => 'required|min:8',
            ];
        } elseif (request()->routeIs('admin.store')) {
            return [
                'name' => 'required|string|max:255',
                'password'  => 'required|min:8|confirmed',
            ];
        } elseif (request()->routeIs('admin.store')) {
            return [
                'name' => 'required|string|max:255',
                'password'  => 'required|min:8|confirmed',
            ];
        }
    }
}
