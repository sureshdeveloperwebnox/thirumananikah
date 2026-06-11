<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\AdditionalAttributeResource;
use App\Models\AdditionalAttribute;

class AdditionalAttributeController extends Controller
{
    public function index()
    {
        $additionalAttributes = AdditionalAttribute::where('status',1)->get();
        return  AdditionalAttributeResource::collection($additionalAttributes)->additional([
            'result' => true
        ]);
    }
}
