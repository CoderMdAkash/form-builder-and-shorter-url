<?php

namespace App\Services;

use App\Models\Field;
use Illuminate\Support\Facades\DB;
class FieldServices
{
    public function store(array $data, $image = null)
    {
        DB::transaction(function() use($data) {
           Field::create($data);
        }, 5);
    }

    public function update(Field $field, array $data)
    {
        DB::transaction(function() use($field, $data) {
           tap($field)->update($data);
        }, 5);
    }


    public function destroy($field)
    {
        $field->update([
            'deleted_at' => now()
        ]);
    }

}
