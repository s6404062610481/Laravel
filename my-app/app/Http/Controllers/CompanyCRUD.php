<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyCRUD extends Controller
{
    //
    public function index(){
        $data['companies'] = Company::orderBy('id', 'desc')->paginate(5);
        return view('companies.index', $data);
    }

    public function create(){
        return view('companies.create');
    }
}
