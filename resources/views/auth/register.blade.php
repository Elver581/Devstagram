@extends('layouts.app')
@section('titulo')
    Registrate en Devstagram
@endsection
@section('contenido')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="md:w-6/12 p-5">
            <img src="{{ asset('img/registrar.jpg') }}" alt="imagen de registro">
        </div>
        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl ">

            <form action="{{ route('register') }}" method="POST" novalidate>
                @csrf
                <div class="mb-5">
                    <label for="name" class="mb-2 block uppercase text-gray-500 font-bold" for="">
                        Nombre
                    </label>
                    <input type="text" id="name" name="name" placeholder="Tu nombre"
                        class="border p-3 w-full rounded-lg @error('name') border-red-500
                          
                        @enderror"
                        value={{old('name')}}>
                        @error('name')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm  p-2 text-center">{{$message}}</p>
                          
                        @enderror
                </div>
                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold" for="">
                        Username
                    </label>
                    <input type="text" id="username" name="username" placeholder="Tu nombre de usuario"
                    class="border p-3 w-full rounded-lg @error('username') border-red-500
                          
                    @enderror"
                    value={{old('username')}}>
                        @error('username')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm  p-2 text-center">{{$message}}</p>
                          
                        @enderror
                </div>
                <div class="mb-5">
                    <label id="email" class="mb-2 block uppercase text-gray-500 font-bold" for="">
                        Email
                    </label>
                    <input type="email" id="email" name="email" placeholder="Tu correo"
                    class="border p-3 w-full rounded-lg @error('email') border-red-500
                          
                    @enderror"
                    value={{old('email')}}>
                        @error('email')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm  p-2 text-center">{{$message}}</p>
                          
                        @enderror
                </div>


                <div class="mb-5">
                    <label id="password" class="mb-2 block uppercase text-gray-500 font-bold" for="">
                        Password
                    </label>
                    <input type="password" id="password" name="password" placeholder="Password de registro"
                    class="border p-3 w-full rounded-lg @error('password') border-red-500
                          
                    @enderror"
                  >
                        @error('password')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm  p-2 text-center">{{$message}}</p>
                          
                        @enderror
                </div>
                <div class="mb-5">
                    <label id="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold" for="">
                        Repetir Password
                    </label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        placeholder="Repite tu password" class="border p-3 w-full rounded-lg">
                </div>
                <input type="submit" value="Crear cuenta"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white
rounded-lg ">
            </form>

        </div>
    </div>
@endsection
