<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{

    use HasFactory;
    use SoftDeletes;


    protected $fillable = [
        'name',
        'description',
        'organization_id',
        'deleted_at'
    ];



    public function formTemplates() {
        return $this->hasMany(FormTemplate::class);
    }

    public function organization() {
        return $this->belongsTo(Organization::class);
    }
}
