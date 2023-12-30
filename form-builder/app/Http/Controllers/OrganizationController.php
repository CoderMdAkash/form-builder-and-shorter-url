<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Illuminate\Http\Request;
use App\Services\OrganizationServices;
use App\Http\Requests\StoreOrganizationRequest;

class OrganizationController extends Controller
{
    public function index()
    {
        $organization = Organization::all();
        return view('organization.index', ['organization' => $organization]);
    }

    public function create()
    {
        return view('organization.create');
    }

    public function store(StoreOrganizationRequest $request,OrganizationServices $organizationServices)
    {
        $organizationServices->store(
            $request->validated()
        );
        return redirect()->route('organization.index')->with(['success' => 'Organization created']);
    }

    public function edit(Organization $organization)
    {
        return view('organization.edit', ['organization' => $organization]);
    }

    public function update(StoreOrganizationRequest $request, Organization $organization,OrganizationServices $organizationServices)
    {
        $organizationServices->update(
            $organization,
            $request->validated()
        );
        return redirect()->route('organization.index')->with(['success' => 'Organization updated']);
    }

    public function destroy(Organization $organization,OrganizationServices $organizationServices)
    {
        $organizationServices->destroy($organization);
        return response('Field deleted');
    }
}
