<?php

namespace App\Http\Controllers;

use App\Mark;
use App\UnitRegistered;
use Illuminate\Http\Request;

class UnitsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        dd('show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        /**
        * Research on 3D array addition
        *
        * 
        */

        //
        // $ids = explode(',',$id);
        // for ($i=0; $i<count($ids); $i++) {
        //     $total_marks[$i] = ($request->m_exam[$i] + ($request->m_assignment[$i] + $request->m_cat[$i])/2);
        //     switch ($total_marks[$i]) {
        //         case $total_marks[$i]>=70 && $total_marks[$i]<=100:
        //             $grade[$i] = 'A';
        //             break;
        //         case $total_marks[$i]>=60 && $total_marks[$i]<=69:
        //             $grade[$i] = 'B';
        //             break;
        //         case $total_marks[$i]>=50 && $total_marks[$i]<=59:
        //             $grade[$i] = 'C';
        //             break;
        //         case $total_marks[$i]>=40 && $total_marks[$i]<=49:
        //             $grade[$i] = 'D';
        //             break;
        //         case $total_marks[$i]<40:
        //             $grade[$i] = 'F';
        //             break;
        //         default:
        //            $grade[$i] = '-';
        //             break;
        //     }
        //     DB::table('marks')
        //     ->where('id',$ids[$i])
        //     ->update([
        //         'm_assignment' => $request->m_assignment[$i],
        //         'm_cat' => $request->m_cat[$i],
        //         'm_exam' => $request->m_exam[$i],
        //         'm_grade' => $grade[$i],
        //     ]);
        // }
        return redirect('admin/students/'.$request->student_id)->with('info','Unit(s) updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function delete (Request $request) 
    {
        $ids = $request->ids;
        Mark::whereIn('id',explode(",",$ids))->delete();
        UnitRegistered::whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>"Unit(s) Deleted successfully."]);
    }
}
