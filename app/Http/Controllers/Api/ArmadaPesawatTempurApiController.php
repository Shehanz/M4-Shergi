<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ArmadaPesawatTempur;
use App\Http\Resources\ArmadaPesawatTempurResource;
use App\Http\Requests\ArmadaPesawatTempurStoreRequest;
use App\Http\Requests\ArmadaPesawatTempurUpdateRequest;
use Illuminate\support\Facades\Log;
use Illuminate\http\Request;

class ArmadaPesawatTempurApiController extends Controller
{
    public function index()
    {
        $armada = ArmadaPesawatTempur::latest()->get();
        return ArmadaPesawatTempurResource::collection($armada);
    }

    public function store(ArmadaPesawatTempurStoreRequest $request)
    {
        $armada = ArmadaPesawatTempur::create($request->validated());
        return new ArmadaPesawatTempurResource($armada);
    }

    public function show(ArmadaPesawatTempur $armada_pesawat_tempur)  // ← ubah jadi snake_case
    {
        return new ArmadaPesawatTempurResource($armada_pesawat_tempur);
    }

    public function update(Request $request, $id)
    {
        $armada = ArmadaPesawatTempur::findOrFail($id);
        $armada->update($request->all());
        return new ArmadaPesawatTempurResource($armada);
    }

    public function destroy(ArmadaPesawatTempur $armada_pesawat_tempur)  // ← ubah
    {
        $armada_pesawat_tempur->delete();
        return response()->json(['message' => 'Armada berhasil dihapus'], 200);
    }
}
