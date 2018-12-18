<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use Faker\Provider\Image;
use Illuminate\Http\Request;
use App\Company;

class CompanyController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::paginate(10);
        return view('company.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
        // Store companies logos in storage/app/public folder and make them accessible from public
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = $file->getClientOriginalName();
            $file->storeAs('/public/logos/', $filename);
        }

        $company = new Company();
        $data = $request->validated();

        $company->saveCompany($data);
        return redirect('/home')->with('success', 'Company has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Company::find($id);
        return view('company.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::find($id);
        return view('company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request, $id)
    {
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = $file->getClientOriginalName();
            $file->storeAs('/public/logos/', $filename);
        }

        $company = new Company();
        $data = $request->validated();

        $data['id'] = $id;
        $company->updateCompany($data);

        return redirect('/home')->with('success', 'Company has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::find($id);
        if ($company != null) {
            $company->delete();
            return redirect('/home')->with('success', 'Company and its Employees has been deleted.');
        }

        return redirect('/home')->with('warning', 'Company has not been deleted.');
    }
}
