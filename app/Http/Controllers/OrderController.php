<?php

namespace App\Http\Controllers;

use App\Http\Requests\Order\StoreRequest;
use App\Http\Requests\Order\UpdateRequest;
use App\Models\Furniture;
use App\Models\General;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::orderBy('id','desc')->paginate(General::COUNT_PAGINATE);
        return view('order.index',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('order.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {

        if($request->type == 1){
            $rules = [
                'description' => 'array',
                'description.*' => 'required|string',
                'note' => 'array',
                'note.*' => 'nullable|string',
            ];

            $customMessages = [
                'description.*.required' => 'Описание обязательно для заполнения',
            ];

            $validator = Validator::make($request->all(),$rules,$customMessages);
            if($validator->fails()){
                $error = $validator->errors()->first('description.*');
                return redirect()->back()->withErrors([$error])->withInput();
            }
        }
        try {
            $data = $request->validated();
            $success = Order::create($data);
            if($request->type == 1){
                for ($i = 0; $i < count($request->description); $i++){
                    if($request->description[$i] != null){
                        Furniture::create([
                            'order_id' => $success->id,
                            'description' => $request->description[$i],
                            'note' => $request-> note[$i]
                        ]);
                    }
                }
            }
            if($success){
                session()->flash('success','Заказ успешно добавлен');
            }

        } catch (\Exception $exception) {
            return $exception->getMessage();
        }

        return redirect()->route('order.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        if( $order->checkType(1) ){
            $furnitures = $order->furniture;
        }else{
            $furnitures = [];
        }

        return view('order.edit',compact('order','furnitures'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Order $order)
    {
        try {

            $data = $request->validated();
            if($request->contract){
                $data['contract'] = true;
            }else{
                $data['contract'] = false;
            }
            if($order->checkType(1) && $request->type == 0){
                $order->furniture()->delete();
            }
            $success = $order->update($data);


            if($success){
                session()->flash('success', 'Информацию успешно обновлена');
            }

        } catch (\Exception $exception) {
            return $exception->getMessage();
        }

        return redirect()->route('order.edit',compact('order'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        try {
            if($order->checkType(1)){
                $order->furniture()->delete();
            }
            $success = $order->delete();

            if($success){
                session()->flash('success', 'Заказ успешно удалён');
            }
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }

        return redirect()->route('order.index');
    }

    public function export(Order $order){
        try {
            $pdf = Pdf::loadView('pdf.order',compact('order'));
            $name = "Заказ №". $order->id;
            return $pdf->stream($name);
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }
}
