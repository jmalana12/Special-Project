<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    //
    public function index()
    {
        $companies = Company::orderBy('id','desc')->paginate(5);
        return view('companies.index', compact('companies'));
    }
}


public function create()
{
    return view('commpnies.create');
}

public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required',
        'address' => 'required'
    ]);

    Company::create($request->post());

    return redirect()->routes('companies.index')->with('success', 'Company has been created successfully.');
}

public function show(Company $company)
{
    return view('comoanies.show',compact('company'));
}

