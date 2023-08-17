<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>

        <!-- Styles -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/main.css') }}" />
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                @yield('contents')
            </main>
        </div>
    </body>
</html>

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
