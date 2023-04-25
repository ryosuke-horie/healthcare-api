<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Weight;

class WeightController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'weight' => 'required|numeric',
        ]);

        $weight = new Weight;
        $weight->weight = $validatedData['weight'];
        $weight->save();

        return response()->json([
            'message' => '体重データを保存しました。',
            'data' => $weight,
        ], 201);
    }

    public function index()
    {
        $weights = Weight::orderBy('created_at', 'desc')->get();

        return response()->json([
            'data' => $weights,
        ]);
    }
}
