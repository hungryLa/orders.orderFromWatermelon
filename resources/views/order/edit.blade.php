@extends('layouts.app')

@section('title')Редактирование заказа@endsection

@section('contents')
    <div class="content">
        <div class="order_editing_nav">
            <h2 class="order_creating_h2"><a href="{{route('order.index')}}">Заказы</a>/Редактирование заказа №{{$order->id}}</h2>
            <form method="POST" action="{{route('order.delete',compact('order'))}}">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">Удалить</button>
            </form>
        </div>
        <x-general.flash/>
        <x-general.errors/>
        <form method="POST" action="{{route('order.update',compact('order'))}}">
            @csrf
            @method('PUT')
            <div class="order_creating_order_info">
                <div>
                    <label class="form-label" for="type">Тип заказа</label>
                    <select  class="form-select type-select" name="type" id="type">
                        @foreach(\App\Models\Order::TYPES as $type)
                            <option @if($order->type == $loop->index) selected @endif value="{{$loop->index}}">{{$type}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3 hidden hidden_input">
                    <label for="color" class="form-label">Цвет</label>
                    <input type="text" class="form-control" id="color" name="color" placeholder="Укажите цвет" value="{{$order->color}}">
                    @error('color')
                    <div class="valid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <x-form.inputText name="title" title="Название" value="{{$order->title}}" placeholder="Введите название"/>
            </div>

            <div class="order_creating_client_info">
                <x-form.inputText name="full_name" title="ФИО" value="{{$order->full_name}}" placeholder="Введите ФИО клиента"/>

                <x-form.inputText name="phone_number" title="Номер телефона" value="{{$order->phone_number}}"
                                  placeholder="Введите номер телефона клиента"/>
            </div>

            <div class="order_creating_client_info_2">
                <div>
                    <label class="form-label" for="type_address">Тип адреса</label>
                    <select  class="form-select type-select" name="type_address" id="type_address">
                        @foreach(\App\Models\Order::TYPES_ADDRESS as $type_address)
                            <option @if($order->type_address == $loop->index) selected @endif value="{{$loop->index}}">{{$type_address}}</option>
                        @endforeach
                    </select>
                </div>

                <x-form.inputText name="address" title="Адрес" value="{{$order->address}}" placeholder="Введите адрес"/>

                <div>
                    <label class="form-label" for="type_payment">Тип оплаты</label>
                    <select  class="form-select type-select" name="type_payment" id="type_payment">
                        <option disabled selected>Выберите тип оплаты</option>
                        @foreach(\App\Models\Order::TYPES_PAYMENT as $type_payment)
                            <option @if($order->type_payment == $loop->index) selected @endif value="{{$loop->index}}">{{$type_payment}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <x-form.inputText name="price" title="Цена" value="{{$order->price}}" placeholder="Введите цену"/>
                </div>

                <div class="col">
                    <x-form.inputText name="delivery_price" title="Стоимость доставки" value="{{$order->delivery_price}}"
                                      placeholder="Введите стоимость доставки"/>
                </div>
                <div class="col">
                    <x-form.inputText name="deposit" title="Аванс" value="{{$order->deposit}}"
                                      placeholder="Укажите аванс"/>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <x-form.inputText name="lifting_price" title="Цена подъёма" value="{{$order->lifting_price}}"
                                      placeholder="Укажите цену подъёма"/>
                </div>
                <div class="col">
                    <x-form.inputText name="assembly_price" title="Цена сборки" value="{{$order->assembly_price}}"
                                      placeholder="Укажите цену сборки"/>
                </div>
                <div class="col">
                    <x-form.inputText name="rest_amount" title="Остаток" value="{{$order->rest_amount}}"
                                      placeholder="Укажите остаток"/>
                </div>
            </div>

            <div class="order_editing_buttons">
                <a class="btn btn-primary" href="{{route('order.export',compact('order'))}}">Экспорт</a>
                <button style="margin-left: auto; display: block" class="btn btn-success">Применить изменения</button>
            </div>
        </form>
        <div class="order_creating_furniture_block hidden">
            <h2>Мебель <a class="btn btn-danger order-creating-furniture-remove hidden">-</a> <a class="btn btn-success order-creating-furniture-add hidden">+</a></h2>
                @csrf
                @if(count($furnitures) != 0)
                    @foreach($furnitures as $furniture)
                    <form method="POST" action="{{route('furniture.update',compact('furniture','order'))}}">
                        @csrf
                        @method('PUT')
                        <div class="order_creating_furniture_input mb-3">
                            <div>
                                <label for="description" class="form-label">Описание</label>
                                <input type="text" class="form-control" id="description" name="description" value="{{$furniture->description}}" placeholder="Укажите краткое описание">
                            </div>
                            <div>
                                <label for="note" class="form-label">Примечание</label>
                                <input type="text" class="form-control" id="note" name="note" value="{{$furniture->note}}" placeholder="Укажите примечание">
                            </div>
                        </div>
                        <div class="order_editing_furniture_statuses">
                            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                <input type="checkbox" class="btn-check" value="{{true}}" name="measurements" id="{{"measurements".$loop->index}}"
                                       @if($furniture->measurements) checked @endif>
                                <label class="btn btn-outline-primary" for="{{"measurements".$loop->index}}">Замеры</label>

                                <input type="checkbox" class="btn-check" value="{{true}}" name="visualization" id="{{"visualization".$loop->index}}"
                                       @if($furniture->visualization) checked @endif>
                                <label class="btn btn-outline-primary" for="{{"visualization".$loop->index}}">Визуализация</label>

                                <input type="checkbox" class="btn-check" value="{{true}}" name="getting_started" id="{{"getting_started".$loop->index}}"
                                       @if($furniture->getting_started) checked @endif>
                                <label class="btn btn-outline-primary" for="{{"getting_started".$loop->index}}">Запуск в работу</label>

                                <input type="checkbox" class="btn-check" value="{{true}}" name="cutting_order" id="{{"cutting_order".$loop->index}}"
                                       @if($furniture->cutting_order) checked @endif>
                                <label class="btn btn-outline-primary" for="{{"cutting_order".$loop->index}}">Заказ распила</label>

                                <input type="checkbox" class="btn-check" value="{{true}}" name="assembling" id="{{"assembling".$loop->index}}"
                                       @if($furniture->assembling) checked @endif>
                                <label class="btn btn-outline-primary" for="{{"assembling".$loop->index}}">Сборка</label>

                                <input type="checkbox" class="btn-check" value="{{true}}" name="delivery_installation" id="{{"delivery_installation".$loop->index}}"
                                       @if($furniture->delivery_installation) checked @endif>
                                <label class="btn btn-outline-primary" for="{{"delivery_installation".$loop->index}}">Доставка,Установка</label>
                            </div>
                            <div>
                                <button class="btn btn-success">Применить изменения</button>

                                <a class="btn btn-danger" href="{{route('furniture.destroy',compact('furniture','order'))}}">Удалить</a>
                            </div>
                        </div>
                    </form>
                    @endforeach
                @endif

            <form method="POST" action="{{route('furniture.store',compact('order'))}}">
                @csrf
                <input type="hidden" name="order_id" value="{{$order->id}}">
                <div class="order_creating_furniture_input mb-3">
                    <div>
                        <label for="description" class="form-label">Описание</label>
                        <input type="text" class="form-control" id="description" name="description" value="{{old('description')}}" placeholder="Укажите краткое описание">
                    </div>
                    <div>
                        <label for="note" class="form-label">Примечание</label>
                        <input type="text" class="form-control" id="note" name="note" value="{{old('note')}}" placeholder="Укажите примечание">
                    </div>
                </div>
                <div class="order_editing_furniture_statuses">
                    <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                        <input type="checkbox" class="btn-check" value="{{true}}" name="measurements" id="measurements"
                               @if(old('measurements')) checked @endif>
                        <label class="btn btn-outline-primary" for="measurements">Замеры</label>

                        <input type="checkbox" class="btn-check" value="{{true}}" name="visualization" id="visualization"
                               @if(old('visualization')) checked @endif>
                        <label class="btn btn-outline-primary" for="visualization">Визуализация</label>

                        <input type="checkbox" class="btn-check" value="{{true}}" name="getting_started" id="getting_started"
                               @if(old('getting_started')) checked @endif>
                        <label class="btn btn-outline-primary" for="getting_started">Запуск в работу</label>

                        <input type="checkbox" class="btn-check" value="{{true}}" name="cutting_order" id="cutting_order"
                               @if(old("cutting_order")) checked @endif>
                        <label class="btn btn-outline-primary" for="cutting_order">Заказ распила</label>

                        <input type="checkbox" class="btn-check" value="{{true}}" name="assembling" id="assembling"
                               @if(old('assembling')) checked @endif>
                        <label class="btn btn-outline-primary" for="assembling">Сборка</label>

                        <input type="checkbox" class="btn-check" value="{{true}}" name="delivery_installation" id="delivery_installation"
                               @if(old('delivery_installation')) checked @endif>
                        <label class="btn btn-outline-primary" for="delivery_installation">Доставка,Установка</label>
                    </div>
                    <div>
                        <button class="btn btn-success">Добавить</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
