<?php

namespace App\Http\Requests;

use App\Rules\ValidPath;
use Illuminate\Foundation\Http\FormRequest;

class Document extends FormRequest
{
    /**
     * Document request validation rules.
     *
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'contents' => 'required',
            'format' => 'sometimes|string',
            'landscape' => 'sometimes|boolean',
            'path' => ['nullable', 'string', new ValidPath],
            'key' => 'required|string',
            'secret' => 'required|string',
            'region' => 'required|string',
            'bucket' => 'required|string',
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'key' => $this->header('s3-key'),
            'secret' => $this->header('s3-secret'),
            'region' => $this->header('s3-region'),
            'bucket' => $this->header('s3-bucket'),
        ]);
    }
}
