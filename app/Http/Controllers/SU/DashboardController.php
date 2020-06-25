<?php

namespace App\Http\Controllers\SU;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Admin;
use App\SU\SuperUser;
use Carbon\Carbon;
use App\Http\Resources\SuResource as SUresource;

class DashboardController extends Controller
{
    // public function __construct()
    // {

    // }
    public function index(){
        // dd(Carbon::now());
        $total_chart = $this->chartData();
        // $total_chart = Admin::whereYear('created_at', '=', date('Y'))->get()->groupBy(function() {
        //     return 'created_at';
        // });
        return view('backend.SUAdmin.index',compact('total_chart'));

    }
    public function chartData()
    {
        $admin_list = Admin::whereYear('created_at', '=', date('Y'))->get()->groupBy(function() {
            return 'created_at';
        });

        $monthly_chart =collect([]);
        foreach (month_arr() as $key => $value) {
            $monthly_chart->push([
                'month' => Carbon::parse(date('Y').'-'.$key)->format('Y-m'),
                'admin_list' =>$admin_list->has($value)?$admin_list[$value]->count():0,

            ]);

        }
        return response()->json($monthly_chart->toArray())->content();

        // return response(['data'=>$admin_list]);
    }
}
