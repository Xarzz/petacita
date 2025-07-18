<?php

namespace App\Http\Controllers;

use App\Models\CareerInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CareerInformationController extends Controller
{
    public function index()
    {
        $career = CareerInformation::where('user_id', Auth::id())->first();
        return response()->json($career);
    }

    public function store(Request $request)
    {
        $request->validate([
            'path_type' => 'required|string', // kuliah/kerja/wirausaha/beasiswa
        ]);

        $career = CareerInformation::updateOrCreate(
            ['user_id' => Auth::id()],
            $request->only([
                'path_type',
                'institution_name',
                'major',
                'company_name',
                'position',
                'startup_idea',
                'business_type',
                'scholarship_name',
                'description',
            ])
        );

        return response()->json($career, 201);
    }

    public function update(Request $request)
    {
        $career = CareerInformation::where('user_id', Auth::id())->firstOrFail();

        $career->update($request->only([
            'path_type',
            'institution_name',
            'major',
            'company_name',
            'position',
            'startup_idea',
            'business_type',
            'scholarship_name',
            'description',
        ]));

        return response()->json($career);
    }

    public function destroy()
    {
        $career = CareerInformation::where('user_id', Auth::id())->firstOrFail();
        $career->delete();

        return response()->json(['message' => 'Career information deleted.']);
    }
}
