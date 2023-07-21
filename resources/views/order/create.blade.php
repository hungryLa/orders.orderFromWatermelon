@extends('layouts.app')

@section('title')Создание заказа@endsection

@section('contents')
    <div class="content">
        <h1 class="order_creating_h1">Создание заказа</h1>
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

            <div class="order_creating_client_info">
                <x-form.inputText name="full_name" title="ФИО" value="{{old('full_name')}}" placeholder="Введите ФИО клиента"/>

                <x-form.inputText name="phone_number" title="Номер телефона" value="{{old('phone_number')}}"
                                  placeholder="Введите номер телефона клиента"/>
            </div>

            <x-form.inputText name="address" title="Адрес" value="{{old('address')}}" placeholder="Введите адрес"/>

            <div class="order_creating_price_box">
                <x-form.inputText name="price" title="Цена" value="{{old('price')}}" placeholder="Введите цену"/>

                <x-form.inputText name="delivery_price" title="Стоимость доставки" value="{{old('delivery_price')}}"
                                  placeholder="Введите стоимость доставки"/>

                <x-form.inputText name="deposit" title="Аванс" value="{{old('deposit')}}"
                                  placeholder="Укажите аванс"/>

                <x-form.inputText name="rest_amount" title="Остаток" value="{{old('rest_amount')}}"
                                  placeholder="Укажите остаток"/>
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
            <button style="margin-left: auto; display: block" class="btn btn-success">Добавить</button>
        </form>
    </div>

@endsection

<script>
    document.addEventListener('DOMContentLoaded',function (){
        const row = document.querySelector('.order_creating_order_info')
        const select = document.querySelector('#type')
        const hide_input = document.querySelector('.hidden_input')
        const furniture_block = document.querySelector('.order_creating_furniture_block')
        const button_add = document.querySelector('.order-creating-furniture-add')
        const button_remove = document.querySelector('.order-creating-furniture-remove')
        let allInputs = document.querySelectorAll('.order_creating_furniture_input')

        function checkType(){
            if(select.value == 0){
                row.style.gridTemplateColumns = '1fr 1fr 1fr'
                hide_input.classList.remove('hidden')
                furniture_block.classList.add('hidden')
            }
            else if(select.value == 1){
                furniture_block.classList.remove('hidden')
                row.style.gridTemplateColumns = '1fr 1fr'
                hide_input.classList.add('hidden')
            }
            else{
                row.style.gridTemplateColumns = '1fr 1fr'
                hide_input.classList.add('hidden')
            }
        }

        function addElement(){
            var newFurnitureInput = document.querySelector('.order_creating_furniture_input_hidden').cloneNode(true);
            newFurnitureInput.classList.add('order_creating_furniture_input')
            newFurnitureInput.children[0].children[1].disabled = false
            newFurnitureInput.children[1].children[1].disabled = false
            newFurnitureInput.classList.remove(...['hidden','order_creating_furniture_input_hidden'])
            allInputs[allInputs.length - 1].insertAdjacentElement('afterend', newFurnitureInput)
            allInputs = document.querySelectorAll('.order_creating_furniture_input')

            if(allInputs.length > 1) {
                button_remove.classList.remove('hidden')
            }
            if (allInputs.length === 2) {
                button_remove.classList.remove("hidden");
            }
        }

        function removeElement() {
            if(allInputs.length > 1) allInputs[allInputs.length - 1].remove()
            allInputs = document.querySelectorAll('.order_creating_furniture_input')
            if (allInputs.length === 1) {
                button_remove.classList.add("hidden");
            }

        }

        button_add.addEventListener('click', addElement)
        button_remove.addEventListener('click', removeElement)

        checkType()
        select.addEventListener('change',function(){
            checkType()
        })
    })
</script>
