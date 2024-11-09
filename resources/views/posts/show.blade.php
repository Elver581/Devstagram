@extends('layouts.app')

@section('titulo')
{{$post->titulo}}

@endsection

@section('contenido')

<div class="containeer mx-auto md:flex" >
    <div class="md:w-1/2">
        <img src="{{asset('uploads').'/'. $post->imagen}}" alt="Imagen del post{{$post->titulo}}">
        <div class="p-3 flex items-center gap-4">
            @auth
            <livewire:like-post :post="$post"/>
         {{--        @if ($post->checkLike(Auth::user()))
                <form  method="POST" action="{{route('posts.likes.destroy',$post)}}" >
                    @method('DELETE')
                    @csrf
                    <div class="my-4">
                        <button type="submit" class="">
                                <svg width="30px" height="30px" viewBox="0 -0.5 1025 1025" class="icon"  version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M512.8 977.4c-26.1 0-50.1-7.3-71.5-21.7C323.5 897 0 675.3 0 400.5 0 212 153.4 58.6 341.9 58.6c60.5 0 119 15.8 170.9 45.9 51.9-30.1 110.5-45.9 170.9-45.9 188.5 0 341.9 153.4 341.9 341.9 0 274.8-323.5 496.6-441.3 555.2-21.4 14.4-45.4 21.7-71.5 21.7zM341.9 144.1c-141.4 0-256.4 115-256.4 256.4 0 117.2 80.6 225.2 148.2 295.1 86.1 89 187.5 155.2 248.1 184.8l6.1 3.7c15.1 10.8 34.6 10.8 49.7 0l6.1-3.7C604.4 850.7 705.8 784.6 791.8 695.6c67.6-69.9 148.2-177.8 148.2-295.1 0-141.4-115-256.4-256.4-256.4-52.6 0-103.2 16-146.5 46.1L512.8 207.3l-24.5-17.1c-43.2-30.2-93.9-46.1-146.4-46.1z" fill="red" /></svg>
                        </button>
                    </div>
                
                </form>
                
                @else
                  <form  method="POST" action="{{route('posts.likes.store',$post)}}" >
                @csrf
                <div class="my-4">
                    <button type="submit" class="">
                            <svg width="30px" height="30px" viewBox="0 -0.5 1025 1025" class="icon"  version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M512.8 977.4c-26.1 0-50.1-7.3-71.5-21.7C323.5 897 0 675.3 0 400.5 0 212 153.4 58.6 341.9 58.6c60.5 0 119 15.8 170.9 45.9 51.9-30.1 110.5-45.9 170.9-45.9 188.5 0 341.9 153.4 341.9 341.9 0 274.8-323.5 496.6-441.3 555.2-21.4 14.4-45.4 21.7-71.5 21.7zM341.9 144.1c-141.4 0-256.4 115-256.4 256.4 0 117.2 80.6 225.2 148.2 295.1 86.1 89 187.5 155.2 248.1 184.8l6.1 3.7c15.1 10.8 34.6 10.8 49.7 0l6.1-3.7C604.4 850.7 705.8 784.6 791.8 695.6c67.6-69.9 148.2-177.8 148.2-295.1 0-141.4-115-256.4-256.4-256.4-52.6 0-103.2 16-146.5 46.1L512.8 207.3l-24.5-17.1c-43.2-30.2-93.9-46.1-146.4-46.1z" fill="black" /></svg>
                    </button>
                </div>
            
            </form>
                @endif --}}
          
        
            @endauth
  
        </div>
        <div>
            <p class="font-bold">{{$post->user->username}}</p>
            <p class="text-sm text-gray-500">{{$post->created_at->diffForHumans()}}</p>
            <p class="mt-5">{{$post->descripcion}}</p>
        </div>
@auth
@if ($post->user_id=== auth()->user()->id)
    <form method="POST" action="{{route('posts.destroy', $post)}}">
        @method('DELETE')
        @csrf
            <input type="submit"
            value="Eliminar Publicacion"
            class="bg-red-500 hover:bg-red-600 p-2 rounded text-center text-white font-bold mt-4 cursor-pointer">
        </form>
@endif
    
@endauth
        
    </div>
    <div class="md:w-1/2 p-5">
<div class="shadow bg-white p-5 mb-5">
    @auth
         <p class="text-xl font-bold text-center mb-4">Agrega un nuevo comentario</p>
         @if (session('mensaje'))
          <div class="bg-green-500 p-2 rounded-lg mb-6 text-white text-center uppercase font-bold ">
            {{session('mensaje')}}
          </div>
             
         @endif
    <form action="{{route('comentario.store',['post'=>$post, 'user'=>$user])}}" method="POST">
        @csrf
        <div class="mb-5">
            <label for="titulo" class="mb-2 block uppercase text-gray-500 font-bold" for="">
             Añade Comentario
            </label>
            <textarea id="descripcion"
             name="comentario" 
             placeholder="Agrega un comentario"
                class="border p-3 w-full rounded-lg @error('name') border-red-500
                  
                @enderror"
               ></textarea>
                @error('comentario')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm  p-2 text-center">{{$message}}</p>
                  
                @enderror
        </div>
        <input type="submit"
         value="Comentar"
        class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white
rounded-lg ">
    </form>
    @endauth
    <div class="bg-white shadow mb-5 max-h-96 overflow-y-scroll mt-10">
        @if ($post->comentarios->count())

        @foreach ($post->comentarios as $comentario )
         <div class="p-5 border-gray-300 border-b">
                <a class="font-bold" href="{{route('post.index',$comentario->user)}}">
            {{$comentario->user->username}}
        </a>
               <p>{{$comentario->comentario}}</p>
        <p class="text-sm text-gray-500">{{$comentario->created_at->diffForHumans()}}</p>
        </div>
     
        @endforeach
            
        @endif
    </div>
   
</div>

    </div>
</div>

@endsection