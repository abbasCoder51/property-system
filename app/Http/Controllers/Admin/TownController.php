<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Town;
use Illuminate\Http\Request;

class TownController extends Controller
{
    public function index(Request $request)
    {
        $towns = Town::query();

        if ($request->get('name')) {
            $towns = $towns->where('name', 'LIKE', '%' . $request->get('name') . '%');
        }

        $towns = $towns->paginate($this->paginateSize);

        return view('admin.town.index')
            ->with('towns', $towns);
    }

    public function show(Town $town)
    {
        return view('admin.town.show')
            ->with('town', $town);
    }
}
