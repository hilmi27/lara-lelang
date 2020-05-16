<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function filter()
    {
        $query = Product::select('id','name','satuan','buy_price','sell_price','created_at');
                if (request('filter_periode')) {
                    $filter_periode = now()->subDays(request ('filter_periode'))->toDateString();                    
                    $query->where('created_at','>=', $filter_periode);
                }
        return datatables ($query)->toJson();
    }

    public function datatablesIndex() 
    {
        return view ('product/datatables');   
    }
}
