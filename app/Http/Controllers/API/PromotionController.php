<?php

namespace App\Http\Controllers\API;

use App\Models\Promo;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Promo $promo)
    {
        // return $promo->all();
        return view('promos.index', [
            'title' => 'Promo',
            'promos' => $promo->all()
        ]);
    }

    public function webview()
    {
        $data = promo::all();
        return view('promo.webview', [
            'header' => 'Promo',
            'promos' => $data
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function promoCreate(Promo $promo)
    {
        $success = $promo->create([
            'uuid' => Str::uuid(),
            'title_promo' => request('title_promo'),
            'description_promo' => request('description_promo'),
            'image_promo' => request('image_promo'),
            'code_promo' => request('code_promo'),
            'discount_promo' => request('discount_promo'),
            'type_discount_promo' => request('type_discount_promo')
        ]);

        if($success) {
            return response()->json([
                'status' => true,
                'message' => 'success',
                'data' => $success
            ]);
        }else{
            return response()->json([
                'status' => false,
                'message' => 'data not found',
                'data' => $success
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function promoGet(Promo $promo)
    {
        return $promo->all();
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
        //
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
}
