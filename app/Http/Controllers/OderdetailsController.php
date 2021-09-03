<?php

namespace App\Http\Controllers;
use App\Models\Order_details;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OderdetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $orderData = $request->input();
        foreach($orderData['orders'] as $key => $value)
        {
            $data = new Order_details();
            $data->order_id = $value['order_id'];
            $data->name = $value['name'];
            $data->thumbnailImage = $value['thumbnailImage'];
            $data->color = $value['color'];
            $data->qty = $value['qty'];
            $data->price = $value['price'];
            $data->save();
        }
       return $request;
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data = Order_details::all();
        return view('payment', ['items'=>$data]);
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
