@extends('layouts.app')
@section('title')Заказы@endsection

@section('contents')
    <div class="content">
        <div class="order_index_nav">
            <h2 class="order_h2">Заказы</h2>
            <a class="btn btn-primary" href="{{route('order.create')}}">Добавить</a>
        </div>
        <x-general.flash/>
        <div class="order_index_guide">
            <span>ДГ - Договор</span>
            <span>ОГ - Отгрузка</span>
            <span>ЗМ - Замеры</span>
            <span>ВЗ - Визуализация</span>
            <span>ЗвР - Запуск в работу</span>
            <span>ЗР - Заказ распила</span>
            <span>Сб - Сборка</span>
            <span>ДУ - Доставка,Установка</span>
        </div>
        <div class="table-responsive">
            <table class="order_index_table table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Дата создания</th>
                    <th scope="col">ФИО</th>
                    <th scope="col">Ном.тел.</th>
                    <th scope="col">Название</th>
                    <th scope="col">Адрес</th>
                    <th scope="col">Цена</th>
                    <th scope="col">Доставка</th>
                    <th scope="col">Аванс</th>
                    <th scope="col">Остаток</th>
                    <th scope="col">Описание</th>
                    <th scope="col">ДГ</th>
                    <th scope="col">ОГ</th>
                    <th scope="col">ЗМ</th>
                    <th scope="col">ВЗ</th>
                    <th scope="col">ЗвР</th>
                    <th scope="col">ЗР</th>
                    <th scope="col">Сб</th>
                    <th scope="col">ДУ</th>
                    <th scope="col">Примечания</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    @if($order->type == 0)
                        <tr data-href="{{route('order.edit',compact('order'))}}">
                            <th scope="row">{{$order->id}}</th>
                            <td>{{\Carbon\Carbon::parse($order->created_at)->format('H:i d.m.Y')}}</td>
                            <td>{{$order->full_name}}</td>
                            <td>{{$order->phone_number}}</td>
                            <td>{{$order->title}}</td>
                            <td>{{$order->address}}</td>
                            <td>{{$order->price}} руб.</td>
                            <td>{{$order->delivery_price ? $order->delivery_price ." руб." : ''}}</td>
                            <td>{{$order->deposit ? $order->deposit ." руб." : ''}}</td>
                            <td>{{$order->rest_amount ? $order->rest_amount ." руб." : ''}}</td>
                            <td>{{$order->color}}</td>
                            <td><input type="checkbox" disabled @if($order->contract) checked @endif></td>
                            <td><input type="checkbox" disabled @if($order->is_shipped) checked @endif></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    @elseif($order->type == 1)
                        @foreach($order->furniture as $furniture)
                            <tr data-href="{{route('order.edit',compact('order'))}}">
                                @if($loop->index == 0)
                                    <th scope="row">{{$order->id}}</th>
                                    <td>{{\Carbon\Carbon::parse($order->created_at)->format('H:i d.m.Y')}}</td>
                                    <td>{{$order->full_name}}</td>
                                    <td>{{$order->phone_number}}</td>
                                    <td>{{$order->title}}</td>
                                    <td>{{$order->address}}</td>
                                    <td>{{$order->price}} руб.</td>
                                    <td>{{$order->delivery_price ? $order->delivery_price ." руб." : ''}}</td>
                                    <td>{{$order->deposit ? $order->deposit ." руб." : ''}}</td>
                                    <td>{{$order->rest_amount ? $order->rest_amount ." руб." : ''}}</td>
                                    <td>{{$furniture->description}}</td>
                                @else
                                    <th scope="row"></th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>{{$furniture->description}}</td>
                                @endif
                                    <td><input type="checkbox" disabled @if($order->contract) checked @endif></td>
                                    <td><input type="checkbox" disabled @if($order->is_shipped) checked @endif></td>
                                    <td><input type="checkbox" disabled @if($furniture->measurements) checked @endif></td>
                                    <td><input type="checkbox" disabled @if($furniture->visualization) checked @endif></td>
                                    <td><input type="checkbox" disabled @if($furniture->getting_started) checked @endif></td>
                                    <td><input type="checkbox" disabled @if($furniture->cutting_order) checked @endif></td>
                                    <td><input type="checkbox" disabled @if($furniture->assembling) checked @endif></td>
                                    <td><input type="checkbox" disabled @if($furniture->delivery_installation) checked @endif></td>
                                <td>{{$furniture->note}}</td>
                            </tr>
                        @endforeach
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="pagination">
            {{$orders->links()}}
        </div>
    </div>

@endsection

<script>
    document.addEventListener('DOMContentLoaded',function(){
        const rows = document.querySelectorAll('tr[data-href]')

        rows.forEach(row => {
            row.addEventListener('click',function(){
                document.location = row.dataset.href
            })
            row.addEventListener('mouseenter',function(){
                row.style.cursor = 'pointer'
                row.style.background = '#fefefe'
            })
            row.addEventListener('mouseleave', function () {
                row.style.background = '#f3f4f6'
            })
        })
    })
</script>
