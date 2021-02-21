@extends('layouts.app')

@section('content')

   <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
         <form action="{{ route('posts') }}" method="post" class="mb-4">
            @csrf
            <div class="mb-4">

               <textarea
                  placeholder="Post something!"
                  name="body" id="body" cols="30" rows="4"
                  class=" border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror"
               >
               </textarea>

               @error('body')
                  <div class="text-red-500 mb-2 text-sm">
                     {{ $message }}

                  </div>
               @enderror

            </div>

            <button
               type="submit"
               class="bg-blue-400 hover:bg-blue-700 text-white py-2 px-4 rounded">
              Post
            </button>
         </form>

         @if ($posts->count())
            @foreach ($posts as $post)
               <div class="mb-4">
                  <a href="" class="font-bold">{{ $post->user->name }}</a>
                  <span class="text-grey-600 text-sm">
                      {{ $post->created_at->diffForHumans() }}   <!-- php carbon lib for time conversions -->
                  </span>
                  <p class="mb-2">{{ $post->body }}</p>

                  <div class="flex item-center">
                    @auth
                        @if (!$post->likedBy(auth()->user()))
                            <form action="{{route('post.likes', $post) }}" method="post" class="mr-1">
                                @csrf
                                <button type="submit" class="text-blue-500">Like</button>
                            </form>

                        @else
                            <form action="{{route('post.likes', $post) }}" method="post" class="mr-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-blue-500">Unlike</button>
                            </form>


                        @endif
                    @endauth

                    <span>{{ $post->likes()->count() }} {{ Str::plural('like', $post->likes()->count()) }}</span>
                  </div>

               </div>

            @endforeach

            {{ $posts->links()}}
         @else
            <p>no posts</p>
         @endif
        </div>

   </div>
@endsection
