<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Note') }}
        </h2>
        <div class="hamburger-menu">
            <input id="menu__toggle" type="checkbox" />
            <label class="menu__btn" for="menu__toggle">
               <span></span>
            </label>

            <ul class="menu__box">
                <li class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white flex justify-center">Collections</li>
                @foreach($categories as $category)
                    @if($category -> category != "normal")
                       <li><a class="menu__item" href="{{ 'note/'.$category -> category }}">{{ $category -> category }}</a></li>
                   @endif
                @endforeach
            </ul>
        </div>
    </x-slot>

    <div class="py-12" style="background-image: linear-gradient(-45deg,#ff748c,#9799ba); height: 1000px;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b flex justify-between border-gray-200">
                    <x-application-logo class="block w-auto" />
                    <div class="grid gap-2 grid-cols-2">
                        <x-notecreate />
                        <x-collectioncreate />
                    </div>
                </div>
                <hr style="width: 100%; color: black;">
                @if(Session('successAlert'))
                    <div id="successAlert" class="p-5 flex justify-center text-white text-lg rounded-lg" style="background-image: linear-gradient(-45deg,#ff748c,#9799ba);">
                        <strong>{{ Session('successAlert') }}</strong>
                    </div>
                @endif
                <div class="grid grid-cols-1 gap-2 md:grid-cols-4 p-6 lg:p-8">
                    @foreach($notes as $note)
                        <div class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                            <a href="{{ url('note/'.$note -> id.'/edit') }}" >
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $note -> title  }}</h5>
                                <p style="height: 120px; overflow: hidden;" class="font-normal text-gray-700 dark:text-gray-400">{{ $note -> content }}</p>
                            </a>
                            <span class="flex justify-between">
                                <span class="text-gray-400 small">
                                    @if($note -> category != 'normal')
                                        <form action="{{ 'note/collection/move/'.$note->id }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <select name="category" style="
                                            background-color: transparent;">
                                                <option value="{{ $note -> category}}">
                                                    {{ $note -> category }}
                                                </option>
                                                @foreach($categories as $category)
                                                    @if($category -> category != 'normal')
                                                        @if($category -> category != $note -> category )
                                                            <option value="{{ $category -> category}}">
                                                                {{ $category -> category }}
                                                            </option>
                                                        @endif
                                                    @endif
                                                @endforeach
                                            </select>
                                            <input type="submit" value="Move">
                                        </form>
                                    @endif
                                </span>
                                <form method="POST" action="{{ url('note/'.$note -> id) }}">
                                    @csrf
                                    @method("DELETE")
                                    <button id="create" class="border border-gray-200  rounded-xl flex justify-center items-center h-12 w-12 text-3xl font-bold bg-white tracking-tight">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    var successAlert = document.getElementById("successAlert");
    setInterval(function () {    
        successAlert.style.display = 'none';      
    },100);
</script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
<style>
    #menu__toggle {
        opacity: 0;
    }
    #menu__toggle:checked + .menu__btn > span {
        transform: rotate(45deg);
    }
    #menu__toggle:checked + .menu__btn > span::before {
        top: 0;
        transform: rotate(0deg);
    }
    #menu__toggle:checked + .menu__btn > span::after {
        top: 0;
        transform: rotate(90deg);
    }
    #menu__toggle:checked ~ .menu__box {
        left: 0 !important;
    }
    .menu__btn {
        position: fixed;
        top: 30px;
        right: 30px;
        width: 30px;
        height: 30px;
        cursor: pointer;
        z-index: 1;
    }
    .menu__btn > span,
    .menu__btn > span::before,
    .menu__btn > span::after {
        display: block;
        position: absolute;
        width: 100%;
        height: 2px;
        background-color: #616161;
        transition-duration: .25s;
    }
    .menu__btn > span::before {
        content: '';
        top: -8px;
    }
    .menu__btn > span::after {
        content: '';
        top: 8px;
    }
    .menu__box {
        display: block;
        position: fixed;
        top: 0;
        left: -100%;
        width: 300px;
        height: 100%;
        margin: 0;
        padding: 80px 0;
        list-style: none;
        background-image: linear-gradient(-45deg,#ff748c,#9799ba);
        color: white;
        box-shadow: 2px 2px 6px rgba(0, 0, 0, .4);
        transition-duration: .25s;
    }
    .menu__item {
        display: block;
        padding: 12px 24px;
        color: white;
        font-family: 'Roboto', sans-serif;
        font-size: 20px;
        font-weight: 600;
        text-decoration: none;
        transition-duration: .25s;
    }
    .menu__item:hover {
        background-color: #CFD8DC;
    }
</style>