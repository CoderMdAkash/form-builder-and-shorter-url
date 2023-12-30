<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Support\Facades\DB;
class CategoryServices
{
    public function store(array $data, $image = null)
    {
        DB::transaction(function() use($data) {

            Category::create($data);

        }, 5);
    }

    public function update(Category $category, array $data)
    {
        DB::transaction(function() use($category, $data) {
           tap($category)->update($data);
        }, 5);
    }



    public function destroy(Category $category)
    {
        $category->update([
            'deleted_at' => now()
        ]);
    }

}
