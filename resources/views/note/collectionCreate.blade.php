
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Note') }}
        </h2>
    </x-slot>
    <form method="POST" class="text-lg" action="{{ url('note') }}">
        @csrf
        <div class="py-12" style="background-image: linear-gradient(-45deg,#ff748c,#9799ba); height: 1000px;">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 lg:p-8 bg-white border-b border-gray-200 flex justify-between">
                        <x-application-logo class="block w-auto" />
                        <div class="grid grid-cols-1">
                            <input name="category" id="category" type="text" class="form-control @error('category') is-invalid @enderror" placeholder="Collection Name..." style="border: none;" value="{{ old('category') }}">
                                @error('category')
                                    <div class="invaild-feedback">{{ $message }}</div>
                                @enderror                        
                        </div>
                    </div>
                    <div class="p-6 lg:p-8">
                        <input name="title" id="title" type="text" class="form-control @error('title') is-invalid @enderror" placeholder="Title..." style="border: none;" value="{{ old('title') }}">
                        @error('title')
                            <div class="invaild-feedback">{{ $message }}</div>
                        @enderror
                        <br>
                        <textarea name="content" id="title" rows="3" class="form-control @error('title') is-invalid @enderror" placeholder="Content..." style="border: none;">{{ old('content') }}</textarea>
                        @error('content')
                            <div class="invaild-feedback">{{ $message }}</div>
                        @enderror
                        <br>
                        <div class="flex justify-center">
                            <button class="btn btn-primary w-32">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-app-layout>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<style>
    a{
        text-decoration: none;
    }
</style>