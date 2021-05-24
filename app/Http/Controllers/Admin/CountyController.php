<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\County;
use Illuminate\Http\Request;

class CountyController extends Controller
{
    public function index(Request $request)
    {
        $counties = County::query();

        if ($request->get('name')) {
            $counties = $counties->where('name', 'LIKE', '%' . $request->get('name') . '%');
        }

        $counties = $counties->paginate($this->paginateSize);

        return view('admin.county.index')
            ->with('counties', $counties);
    }

    public function show(County $county)
    {
        return view('admin.county.show')
            ->with('county', $county);
    }
}
