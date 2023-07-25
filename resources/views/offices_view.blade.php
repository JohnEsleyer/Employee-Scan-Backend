@extends('layouts.app')

@section('content')
<div class="flex flex-row h-screen bg-gray-200">
  <!-- Navigation Bar -->
  <div id="navbar" class="w-1/3 dark:bg-gray-800 text-white shadow-lg">
    <!-- Your content here -->
    @include('layouts.navbar')
  </div>
  <script>
    window.addEventListener('resize', function() {
      var element = document.getElementById('navbar');
      var screenWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
      
      if (screenWidth < 640) { // Adjust the breakpoint as needed
        element.classList.add('hidden');
      } else {
        element.classList.remove('hidden');
      }
    });
  </script>

  <!-- Main Content -->
  <div class="bg-gray-200 w-full h-screen">
    <div class="m-20">
      <div id="dtr" class="container bg-white rounded-lg m-5 shadow-lg w-full p-5 ">
      <h1 class="text-xl font-bold p-4">Offices</h1>
      <!-- Offices -->
      <div class="overflow-y-auto h-96">
                <table class="w-full table-auto text-left">
                    <thead class="border-b font-medium">
                        <tr>
                            <th>Office Name</th>
                            <th>Department</th>
                            <th class="text-right">Edit/Delete</th>
                        </tr>    
                    </thead>
                    <tbody>
                        @foreach ($offices as $office)
                        <tr>
                            <td>
                                {{ $office->name }}
                            </td>
                            <td>
                                {{ $office->department_id }}
                            </td>
                            <td class="text-right">
                                <div class="inline-flex">
                                    <button class="bg-amber-500 hover:bg-amber-400 text-gray-800 font-bold py-2 px-0 rounded inline-flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="48"><path d="M480-120v-71l216-216 71 71-216 216h-71ZM120-330v-60h300v60H120Zm690-49-71-71 29-29q8-8 21-8t21 8l29 29q8 8 8 21t-8 21l-29 29ZM120-495v-60h470v60H120Zm0-165v-60h470v60H120Z"/>
                                        </svg>
                                  </button>
                                  <button class="bg-red-500 hover:bg-red-400 text-gray-800 font-bold py-2 px-0 rounded inline-flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="48"><path d="M261-120q-24.75 0-42.375-17.625T201-180v-570h-41v-60h188v-30h264v30h188v60h-41v570q0 24-18 42t-42 18H261Zm438-630H261v570h438v-570ZM367-266h60v-399h-60v399Zm166 0h60v-399h-60v399ZM261-750v570-570Z"/>
                                    </svg>
                              </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- End of Offices -->
      </div>
      <div>
    </div>

          <script>

          
        </script>

</div>
    
@endsection