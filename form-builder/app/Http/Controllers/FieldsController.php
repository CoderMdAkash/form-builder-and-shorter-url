<?php

namespace App\Http\Controllers;

use App\Models\Field;
use App\Models\FormTemplate;
use Illuminate\Http\Request;
use App\Services\FieldServices;
use App\Http\Requests\StoreFieldRequest;

class FieldsController extends Controller
{
    public function index()
    {
        $fields = Field::orderBy('order','ASC')->get();
        return view('fields.index', ['fields' => $fields]);
    }

    public function create()
    {
        $formTemplate = FormTemplate::get();
        return view('fields.create',['formTemplate'=>$formTemplate]);
    }

    public function store(StoreFieldRequest $request,FieldServices $fieldServices)
    {
        $data = $request->validated();
        if (isset($data['options']) && is_array($data['options'])) {
            $data['options'] = json_encode($data['options']);
        }
        $fieldServices->store($data);
        return redirect()->route('fields.index')->with(['success' => 'Field created']);
    }

    public function edit(Field $field)
    {
        $formTemplate = FormTemplate::get();
        return view('fields.edit', ['field' => $field,'formTemplate'=>$formTemplate]);
    }

    public function update(StoreFieldRequest $request, Field $field,FieldServices $fieldServices)
    {

        $data = $request->validated();
        if (isset($data['options']) && is_array($data['options'])) {
            $data['options'] = json_encode($data['options']);
        }
        $fieldServices->update($field , $data);
        return redirect()->route('fields.index')->with(['success' => 'Field updated']);
    }

    public function destroy(Field $field,FieldServices $fieldServices)
    {
        $fieldServices->destroy($field);
        return response('Field deleted');
    }
}
