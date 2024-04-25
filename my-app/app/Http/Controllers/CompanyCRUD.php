<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyCRUD extends Controller
{
    //
    public function index(){
        $data['companies'] = Company::orderBy('id', 'asc')->paginate(5);
        return view('companies.index', $data);
    }

    public function create(){
        return view('companies.create');
    }

    public function store(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'address'=>'required'
        ]);
        
        $company = new Company;

        $company->name = $request->name;
        $company->email = $request->email;
        $company->address = $request->address;
        $company->save();
        return redirect()->route('companies.index')->with('success', 'Create Success');
    }

    public function edit(Company $company){
        return view('companies.edit', compact('company'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'address'=>'required'
        ]);

        $company = Company::find($id);
        $company->name = $request->name;
        $company->email = $request->email;
        $company->address = $request->address;
        $company->save();

        return redirect()->route('companies.index')->with('success', 'Edit Success');
    }

    public function destroy(Company $company){
        $company->delete();
        return redirect()->route('companies.index')->with('success', 'Delete Success');
    }

    public function search(Request $request){

        $search = $request->input('search');

        $companies = Company::where('name','Like','%'.$search.'%')->get();

        return view('companies.index', compact('companies'));
    }
}
