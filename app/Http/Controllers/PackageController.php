<?php

namespace App\Http\Controllers;

use App\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    //
    public function getPackage()
    {
        return Package::get();
    }


    public function search(Request $request)
    {
        $blog = Package::query();
        if ($request->input('searchkey') != "") {
            $keyword = $request->input('searchkey');
            $blog->where(function ($query) use ($keyword) {
                $query->where('name', 'LIKE', "%$keyword%");
            });
        }
        return $blog->orderBy('name', 'desc')->get();
    }
}
