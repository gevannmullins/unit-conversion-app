<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RhinoAfrica\UnitConversionObjects\Services\UnitConversionService;
use RhinoAfrica\UnitConversionObjects\Units\Meter;

class UnitConversionController extends Controller
{
    public function index()
    {
        return view('unit_conversion');
    }

    public function convert(Request $request)
    {
       // Assuming you have validated the input in the form
       $value = (float) $request->input('value');
       $fromUnit = $request->input('from_unit');
       $toUnit = $request->input('to_unit');

       // Create source unit object
       $sourceUnit = new Meter();
       $sourceUnit->setValue($value);

       // Initialize the converter service
       $unitConversionService = new UnitConversionService();

       try {
           // Convert from source unit to target unit
           $targetUnit = $unitConversionService->convert($sourceUnit, $toUnit);
           $convertedValue = $targetUnit->getValue();
           return view('unit_conversion', compact('convertedValue'));
       } catch (\Exception $e) {
           // Handle conversion errors
           return redirect()->route('unit.conversion')->with('error', 'Conversion failed: ' . $e->getMessage());
       }
    }
}