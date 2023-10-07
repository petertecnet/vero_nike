<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CsvImportRequest extends FormRequest
{
    public function rules(): array
    {
        ///IMPORT CSV FILE REQUEST HERE ...
        ///IMPORT CSV FILE REQUEST HERE ...
        ///IMPORT CSV FILE REQUEST HERE ...


        return [
            'csv_file' => ['required', 'file']
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}