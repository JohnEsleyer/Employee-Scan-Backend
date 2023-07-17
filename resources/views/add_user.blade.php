<!-- add_user.blade.php -->

@extends('layouts.app')

@section('content')
<div class="flex h-screen bg-gray-200">

      <!-- Navigation Bar -->
      <div id="navbar" class="w-1/4 dark:bg-gray-800 text-white shadow-lg">
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
    <div class="w-full grid grid-cols-2 max-h-screen gap-4 overflow-auto">
    
        <!-- Users -->
        <div class= "container bg-white rounded-lg m-4 shadow-lg p-6 w-full">
            <div class="flex items-center justify-between">
                <h1 class="font-bold">Users</h1>
                {{-- <button class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 rounded">Sort</button> --}}
                <select id="sorting-users-dropdown" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5">
                    <option value="ascDateCreated" selected>Date created (Ascending)</option>
                    <option value="descDateCreated">Date created (Descending)</option>
                    <option value="ascDateModified">Date modified (Ascending)</option>
                    <option value="descDateModified">Date modified (Descending)</option>
                </select>
            </div>
            <hr class="my-3 h-0.5 border-t-0 bg-gray-400 opacity-100 dark:opacity-100"/>
            <div class="overflow-y-auto h-96">
                <table class="w-full table-auto text-left">
                    <thead class="border-b font-medium">
                        <tr>
                            <th>Username</th>
                            <th>Name</th>
                            <th class="text-right">Edit/Delete</th>
                        </tr>    
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>
                                {{ $user->username }}
                                @if($user->created_at->diffInDays(now()) < 7)
                                    <span class="inline-flex items-center justify-center px-2 ml-3 text-sm font-medium text-gray-800 bg-red-300 rounded-full">New</span>
                                @endif
                                @if($user->updated_at->diffInDays(now()) < 7 && $user->created_at->diffInDays(now()) > 7)
                                    <span class="inline-flex items-center justify-center px-2 ml-3 text-sm font-medium text-gray-800 bg-green-300 rounded-full">Updated</span>
                                @endif
                            </td>
                            <td>{{ $user->name }}</td>
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
        </div>
        <!--Add user-->
        <div class="container bg-white rounded-lg m-4 shadow-lg p-6 w-1/2">
            <h1 class="font-bold">Add User</h1>
            <hr class="my-3 h-0.5 border-t-0 bg-gray-400 opacity-100 dark:opacity-100"/>
            <form id="add-user-form">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                        Username
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" name="username" type="text" placeholder="Username">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="first_name">
                        First Name
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="first_name" name="first_name" type="text" placeholder="First Name">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="last_name">
                        Last Name
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="last_name" name="last_name" type="text" placeholder="Last Name">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                        Password
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password" name="password" type="password" placeholder="Password">
                </div>
                <div class="mb-4">
                    <button id="create-user-btn" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                        Create
                    </button>
                </div>
            </form>
            <div id="error-message" class="text-red-500"></div> <!-- Element to display the error message -->
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function () {
                $('#create-user-btn').click(function () {
                    var formData = $('#add-user-form').serialize();

                    $.ajax({
                        url: "{{ route('register') }}",
                        type: "POST",
                        data: formData,
                        success: function (response) {
                            // Handle the success response
                            console.log(response);
                            location.reload(); // Refresh the page
                        },
                        error: function (xhr) {
                            // Handle the error response
                            console.error(xhr);
                            var errorMessage = xhr.responseJSON.message; // Extract the error message from the response
                            $('#error-message').text(errorMessage); // Display the error message in the element
                        }
                    });
                });
            });
        </script>


</div> 
</div>
@endsection