@extends('layouts.app')

@section('title')Создание заказа@endsection

@section('contents')
    <div class="content">
        <div class="order_creating_nav">
            <h2 class="order_creating_h2">Создание заказа</h2>
        </div>
        <x-general.errors/>
        <form method="POST" action="{{route('order.store')}}">
            @csrf
            <div class="order_creating_order_info">
                <div>
                    <label class="form-label" for="type">Тип заказа</label>
                    <select  class="form-select type-select" name="type" id="type">
                        <option disabled selected>Выберите тип заказа</option>
                        @foreach(\App\Models\Order::TYPES as $type)
                            <option @if(old('type') == $loop->index) selected @endif value="{{$loop->index}}">{{$type}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3 hidden hidden_input">
                    <label for="color" class="form-label">Цвет</label>
                    <input type="text" class="form-control" id="color" name="color" placeholder="Укажите цвет" value="{{old('color')}}">
                    @error('color')
                    <div class="valid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <x-form.inputText name="title" title="Название" value="{{old('title')}}" placeholder="Введите название"/>
            </div>

            <div class="order_creating_client_info_2">
                <x-form.inputText name="full_name" title="ФИО" value="{{old('full_name')}}" placeholder="Введите ФИО клиента"/>

                <x-form.inputText name="phone_number" title="Номер телефона" value="{{old('phone_number')}}"
                                  placeholder="Введите номер телефона клиента"/>

                <x-form.inputWithType type="date" name="deadline_delivery" title="Срок сдачи" value="{{old('deadline_delivery')}}"
                                  placeholder="Введите срок сдачи заказа"/>
            </div>

            <div class="order_creating_client_info_2">
                <div>
                    <label class="form-label" for="type_address">Тип адреса</label>
                    <select  class="form-select type-select" name="type_address" id="type_address">
                        <option disabled selected>Выберите тип адреса</option>
                        @foreach(\App\Models\Order::TYPES_ADDRESS as $type_address)
                            <option @if(old('type_address') == $loop->index) selected @endif value="{{$loop->index}}">{{$type_address}}</option>
                        @endforeach
                    </select>
                </div>
                <x-form.inputText name="address" title="Адрес" value="{{old('address')}}" placeholder="Введите адрес"/>
                <div>
                    <label class="form-label" for="type_payment">Тип оплаты</label>
                    <select  class="form-select type-select" name="type_payment" id="type_payment">
                        <option disabled selected>Выберите тип оплаты</option>
                        @foreach(\App\Models\Order::TYPES_PAYMENT as $type_payment)
                            <option @if(old('type_payment') == $loop->index) selected @endif value="{{$loop->index}}">{{$type_payment}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <x-form.inputText name="price" title="Цена" value="{{old('price')}}" placeholder="Введите цену"/>
                </div>

                <div class="col">
                    <x-form.inputText name="deposit" title="Аванс" value="{{old('deposit')}}"
                                      placeholder="Укажите аванс"/>
                </div>
                <div class="col">
                    <x-form.inputText name="delivery_price" title="Стоимость доставки" value="{{old('delivery_price')}}"
                                      placeholder="Введите стоимость доставки"/>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <x-form.inputText name="lifting_price" title="Цена подъёма" value="{{old('lifting_price')}}"
                                      placeholder="Укажите цену подъёма"/>
                </div>
                <div class="col">
                    <x-form.inputText name="assembly_price" title="Цена сборки" value="{{old('assembly_price')}}"
                                      placeholder="Укажите цену сборки"/>
                </div>
                <div class="col">
                    <x-form.inputText name="rest_amount" title="Остаток" value="{{old('rest_amount')}}"
                                      placeholder="Укажите остаток"/>
                </div>
            </div>
            <div class="order_creating_furniture_block hidden">
                <h2>Мебель <a class="btn btn-danger order-creating-furniture-remove hidden">-</a> <a class="btn btn-success order-creating-furniture-add">+</a></h2>
                <div class="order_creating_furniture_input_hidden mb-3 hidden">
                    <div>
                        <label for="description" class="form-label">Описание</label>
                        <input type="text" class="form-control" id="description" name="description[]" disabled placeholder="Укажите краткое описание">
                    </div>
                    <div>
                        <label for="note" class="form-label">Примечание</label>
                        <input type="text" class="form-control" id="note" name="note[]" disabled placeholder="Укажите примечание">
                    </div>
                </div>
                <div class="order_creating_furniture_input mb-3">
                    <div>
                        <label for="description" class="form-label">Описание</label>
                        <input type="text" class="form-control" id="description" name="description[]" placeholder="Укажите краткое описание">
                    </div>
                    <div>
                        <label for="note" class="form-label">Примечание</label>
                        <input type="text" class="form-control" id="note" name="note[]" placeholder="Укажите примечание">
                    </div>
                </div>
            </div>
            <div class="order_creating_buttons">
                <input type="checkbox" class="btn-check" name="contract" id="contract" checked >
                <label class="btn btn-outline-primary" for="contract">Договор заключен</label>
                <button style=" display: block" class="btn btn-success">Добавить</button>
            </div>
        </form>
    </div>

@endsection
