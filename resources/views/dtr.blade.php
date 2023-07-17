@extends('layouts.app')

@section('content')
    @include('layouts.navbar')
    <div class="flex flex-row ml-72">
        <div class="flex flex-col w-1/4">
          <div class="container bg-white rounded-lg m-4 shadow-lg p-6 w-full">
            <h1 class="font-bold">Employee's DTR</h1>
            <hr class="my-3 h-0.5 border-t-0 bg-gray-400 opacity-100 dark:opacity-100"/>            
            
            {{-- Department DTR --}}
            <label for="underline_select" class="sr-only">Underline select</label>
            <select id="underline_select" class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-gray-200 appearance-none peer">
                <option selected class="text-gray-500">Department</option>
                {{-- <option value="a">a1</option> --}}
                @for ($i = 0; $i < 10; $i++)
                <option value="$i">a {{ $i }}</option>
                @endfor
            </select>
            <br>
            {{-- Department DTR --}}
            <label for="underline_select" class="sr-only">Underline select</label>
            <select id="underline_select" class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-gray-200 appearance-none peer">
                <option selected class="text-gray-500">Year</option>
                {{-- <option value="a">a1</option> --}}
                @for ($i = 0; $i < 10; $i++)
                <option value="$i">a {{ $i }}</option>
                @endfor
            </select>
            <br>
            {{-- Department DTR --}}
            <label for="underline_select" class="sr-only">Underline select</label>
            <select id="underline_select" class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-gray-200 appearance-none peer">
                <option selected class="text-gray-500">Month</option>
                @for ($i = 0; $i < 10; $i++)
                  <option value="$i">a {{ $i }}</option>
                @endfor
            </select>
          </div>
        </div>
        <div class="container bg-white rounded-lg m-4 shadow-lg p-6 w-full ml-10">
          <div class="flex items-center justify-between">
            <h1 class="font-bold">Employees</h1>
                        
            <form>   
              <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
              <div class="relative">
                  <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                  </div>
                  <input type="search" id="default-search" class="block w-full p-2.5 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50" placeholder="Search employee" required>
                  <button type="submit" class="text-white absolute right-1 bottom-1 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-2">

                    <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>

                  </button>
              </div>
            </form>


          </div>
          <hr class="my-3 h-0.5 border-t-0 bg-gray-400 opacity-100 dark:opacity-100"/>
          <div class="overflow-y-auto h-200">
            @for ($i = 0; $i < 20; $i++)
              <a href="" class="block w-full p-1 mb-2 pl-3 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100">
                <h5 class="text-lg font-bold tracking-tight text-gray-900">Jan Mar Espiritu</h5>
                <p class="font-light text-sm text-gray-500">IT Department</p>
              </a>
            @endfor
          </div>
        </div>
    </div>
    
@endsection