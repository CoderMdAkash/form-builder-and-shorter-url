<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FormSubmission extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'user_id',
        'form_template_id',
        'submitted_data',
        'deleted_at'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
    public function formTemplate() {
        return $this->belongsTo(FormTemplate::class);
    }
}
