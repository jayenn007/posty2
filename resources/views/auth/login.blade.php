@extends('layouts.app')

@section('content')

   <div class="flex justify-center">
        <div class="w-4/12 bg-white p-6 rounded-lg">
            <div class="container max-w-sm mx-auto flex-1 flex flex-col items-center justify-center px-2">
                <div class="bg-white px-6 py-8 rounded shadow-md text-black w-full">
                    <form action="{{ route('login') }}" method="post" >
                    @csrf
                    
                    <div>
                        <input 
                            type="text"
                            class="block border border-grey-light w-full p-3 rounded mb-4"
                            name="email"
                            value="{{ old('name') }}"
                            placeholder="Email" />

                            @error('email')
                                <div class="text-red-500 mb-2 text-sm">
                                    {{ $message }}
                                
                                </div>
                            @enderror


                    </div>

                    <input 
                        type="password"
                        class="block border border-grey-light w-full p-3 rounded mb-4"
                        name="password"
                        placeholder="Password" />
                    
                    <button
                        type="submit"
                        class="w-full border text-white text-center py-3 rounded bg-blue-400 text-blue hover:bg-blue-500 focus:bg-blue-700 outline-none my-1"
                    >Login</button>
                    </form>
                </div>
            </div>
        </div>
   
   </div>
@endsection