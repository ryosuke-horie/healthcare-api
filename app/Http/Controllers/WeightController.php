<?php

namespace App\Http\Controllers;

use App\Models\Weight;
use Illuminate\Http\Request;

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

    /**
     * 登録された体重データの一覧を取得する
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $weights = Weight::all();

        return response()->json($weights);
    }

    /**
     * 指定されたIDの体重データを更新する
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $weight = Weight::find($id);
        if (!$weight) {
            return response()->json(['error' => '指定されたIDの体重データが存在しません'], 404);
        }

        $weight->weight = $request->input('weight');
        $weight->save();

        return response()->json($weight);
    }

    /**
     * 指定されたIDの体重データを削除する
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $weight = Weight::find($id);
        if (!$weight) {
            return response()->json(['error' => '指定されたIDの体重データが存在しません'], 404);
        }

        $weight->delete();

        return response()->json(['message' => '体重データを削除しました']);
    }
}
