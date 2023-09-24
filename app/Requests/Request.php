<?php

declare(strict_types=1);

namespace App\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

abstract class Request extends FormRequest
{
    abstract public function rules(): array;

    public function authorize(): bool
    {
        return true;
    }

    public function getCurrentUser(): User
    {
        return $this->user();
    }
}