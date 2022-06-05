<?php

namespace App\Http\Controllers;

use App\Company;
use App\Http\Resources\CompanyResource;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function stats()
    {
        return CompanyResource::collection(Company::paginate(999));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|max:50|unique:companies,email'

        ]);
            Company::create([
                'email' => request('email')
            ]);
        return response()->json(['message' => 'success'],200);
    }
    public function deleteEmail($id)
    {
        $email = Company::find($id);
        $email->delete();
        return response()->json('deleted');
    }
    public function countEmails()
    {
        $total = Company::all('email')->count();
        return response()->json($total,200);
    }

    public function index() {
        return view('/welcome');
    }

}
