<?php

namespace App\Services;

use App\Models\FormTemplate;
use Illuminate\Support\Facades\DB;
class FormTemplateServices  
{
    public function store(array $data, $image = null)
    {
        DB::transaction(function() use($data) {
    
            FormTemplate::create($data);
            
        }, 5);
    }

    public function update(FormTemplate $formTemplate, array $data)
    {
        DB::transaction(function() use($formTemplate, $data) {
           tap($formTemplate)->update($data);
        }, 5);
    }


    public function destroy(FormTemplate $formTemplate)
    {
        $formTemplate->update([
            'deleted_at' => now()
        ]);
    }

}