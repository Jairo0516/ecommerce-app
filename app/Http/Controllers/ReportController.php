<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Report;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use function PHPUnit\Framework\isNull;

class ReportController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) : Response
    {

        $date_ini =  \Carbon\Carbon::parse($request->date_ini);
        $date_end =  \Carbon\Carbon::parse($request->date_end);


        $report = new Report();
        $report->name = strtoupper($request->name);
        $report->date_ini =$date_ini;
        $report->file = '';
        $report->date_end = $date_end;
        $report->created_at = \Carbon\Carbon::now();
        $report->updated_at = \Carbon\Carbon::now();
        $report->save();


        return Inertia::render('Reports/CreateReport', [
            'status' => true,
        ]);
    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return ($product);
    }

    /**
     * Display the specified resource.
     *
     * @return array
     */
    public function all() : Response
    {
        $report = Report::all();

        return Inertia::render('Reports/ListReport', [
            'reports' => $report,
        ]);

    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request) : Response
    {

        return Inertia::render('Shop/EditProduct', [
            'status' => true
        ]);
    }




}
