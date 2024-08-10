<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PurchasesHistory;
use Illuminate\Http\Request;

class PurchasesHistoryController extends Controller
{

    public function export()
    {
        $purchasesHistory = PurchasesHistory::all();
        return view('ExportPurchasesHistory', array('purchasesHistory' => $purchasesHistory));
    }
}
