<?php

namespace App\Http\Controllers;

use App\Model\Company;
use Illuminate\Http\Request;

class CompanyCRUD extends Controller
{
    //
    //create index

    public function index(){
        $data['companies'] = Company::orderBy('id', 'desc')->paginate(5);
        return view('companies.index', $data);
    }

    public function create(){
        return view('companies.create');
    }
}
