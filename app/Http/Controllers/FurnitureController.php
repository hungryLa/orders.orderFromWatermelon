<?php

namespace App\Http\Controllers;

use App\Http\Requests\Furniture\StoreRequest;
use App\Http\Requests\Furniture\UpdateRequest;
use App\Models\Furniture;
use Illuminate\Http\Request;

class FurnitureController extends Controller
{

    public function store(StoreRequest $request){
        try {
            $order = $request->order;
            $data = $request->validated();

            $success = Furniture::create($data);

            if($success){
                session()->flash('success', 'Запись успешно добавлена');
            }

        } catch (\Exception $exception) {
            return $exception->getMessage();
        }

        return redirect()->route('order.edit',compact('order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Furniture $furniture)
    {
        try {
            $order = $request->order;
            $data = $request->validated();
            if(!$request->has('measurements')){
                $data['measurements'] = false;
            }
            if(!$request->has('visualization')){
                $data['visualization'] = false;
            }

            if(!$request->has('getting_started')){
                $data['getting_started'] = false;
            }
            if(!$request->has('cutting_order')){
                $data['cutting_order'] = false;
            }

            if(!$request->has('assembling')){
                $data['assembling'] = false;
            }

            if(!$request->has('delivery_installation')){
                $data['delivery_installation'] = false;
            }

            $success = $furniture->update($data);

            if($success){
                session()->flash('success', 'Информация успешно обновлена');
            }

        } catch (\Exception $exception) {
            return $exception->getMessage();
        }

        return redirect()->route('order.edit',compact('order'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Furniture $furniture)
    {
        try {
            $order = $request->order;
            $success = $furniture->delete();
            if($success){
                session()->flash('success','Запись успешно удалена');
            }
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }

        return redirect()->route('order.edit',compact('order'));
    }
}
