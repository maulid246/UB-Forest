<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;

class DataController extends Controller
{
    /**
     * Get the current data values.
     */
    public function getData()
    {
        // Assuming you have one record in the table
        $data = Data::first();

        // If no data exists, create a new row with default values
        if (!$data) {
            $data = Data::create([
                'resident_count' => 0,
                'tree_count' => 0,
                'admin_count' => 0
            ]);
        }

        return response()->json($data);
    }

    /**
     * Update the data values.
     */
    public function updateData(Request $request)
    {
        $data = Data::first(); // Fetch the existing data record
        
        if (!$data) {
            $data = Data::create([
                'resident_count' => 0,
                'tree_count' => 0,
                'admin_count' => 0
            ]);
        }

        // Update the values
        $data->update([
            'resident_count' => $request->resident_count,
            'tree_count' => $request->tree_count,
            'admin_count' => $request->admin_count,
        ]);

        return response()->json(['message' => 'Data updated successfully']);
    }
}
