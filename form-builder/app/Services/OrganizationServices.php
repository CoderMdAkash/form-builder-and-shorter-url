<?php

namespace App\Services;

use App\Models\Organization;
use Illuminate\Support\Facades\DB;
class OrganizationServices
{
    public function store(array $data, $image = null)
    {
        DB::transaction(function() use($data) {

            Organization::create($data);

        }, 5);
    }

    public function update(Organization $category, array $data)
    {
        DB::transaction(function() use($category, $data) {
           tap($category)->update($data);
        }, 5);
    }



    public function destroy(Organization $category)
    {
        $category->update([
            'deleted_at' => now()
        ]);
    }

}
