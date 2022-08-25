<?php

namespace App\Http\Controllers\Website;

use App\Filters\OfferFilters;
use App\Http\Controllers\Api\FrontController;
use App\Models\Item;
use App\Models\Offer;
use App\Models\News;
use App\Models\HomeItem;
use App\Models\OfferDiscount;
use App\Models\Anoucement;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function homePage(Request $request){
        $menu = [];

        $return = (app(\App\Http\Controllers\Api\MenuController::class)->getAllCategories2())->getOriginalContent();

        if($return['success'] == 'success'){
            $menu['categories'] = $return['data'];
        }
        $return = (app(FrontController::class)->getGallery())->getOriginalContent();
        if($return['success'] == 'success'){
            $menu['galleries'] = (count($return['data']))? $return['data'] : [];
        }
        $return = (app(FrontController::class)->getAboutUS())->getOriginalContent();
        if($return['success'] == 'success'){
            $menu['aboutus'] = (count($return['data']))? $return['data'][0] : '';
        } 
        // $return = (app(FrontController::class)->getAllNews())->getOriginalContent();
        // if($return['success'] == 'success'){
             $menu['news'] = News::latest()->take(3)->get();
        // }
        $request = new \Illuminate\Http\Request();
        if(session()->has('service_type')){
            $request->merge(['type' => session()->get('service_type')]);
        }
        $request->merge(['now' => Carbon::now()]);
        $filters = new OfferFilters($request);
        $offers = Offer::with('buyGet', 'discount')->filter($filters)->get();
        // $return = (app(\App\Http\Controllers\Api\OffersController::class)->index($request, $filters))->getOriginalContent();
        // if($return['success'] == 'success'){
        //     $menu['offers'] = (count($return['data']))? $return['data'] : [];
        // }
        $menu['offers'] = $offers;
        $menu['main_offer']=Offer::with('buyGet', 'discount')->where('main',1)->get();
        $dealItems = Item::where('best_seller', 'activate')->get();
        $menu['categoryof_dealitems']=$dealItems->pluck('category_id')->toArray();
        $menu['dealItems'] = ($dealItems->count() > 0)? $dealItems : [];
        $menu['recommended']=Item::where('recommended', true)->get();
        $menu['homeitem']=HomeItem::all();
        $menu['anoucement']=Anoucement::all();
        return view('website.index',compact(['menu']));
    } 
}


