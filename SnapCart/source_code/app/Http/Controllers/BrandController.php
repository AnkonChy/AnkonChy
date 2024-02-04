<?php
namespace App\Http\Controllers;
use App\Models\Brand;
use App\Helper\ResponseHelper;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

class BrandController extends Controller
{

    public function ByBrandPage()
    {
        return view('pages.product-by-brand');
    }


    public function BrandList():JsonResponse
    {
        $data= Brand::all();
        return ResponseHelper::Out('success',$data,200);
    }
}
