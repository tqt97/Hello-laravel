<?php

namespace App\Http\Controllers;

use App\Models\Migration;
use Illuminate\Http\Request;

class MigrationController extends Controller
{
    public function index(){
        $migrations = Migration::latest('id')->paginate(5);;
        //dd($migrations);

        return view('admin.migration.index', compact('migrations'));
    }

}
