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
            <div>
            <h1 class="text-3xl font-bold mb-6">Create Office</h1>
            <form id="createOfficeForm" class="max-w-sm">
                @csrf <!-- Add Laravel CSRF token for form submission -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Name:</label>
                    <input type="text" id="name" name="name" required class="w-full px-3 py-2 border rounded-md">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="department">Department:</label>
                    <select id="department" name="department_id" required class="w-full px-3 py-2 border rounded-md">
                        <option value="">Select Department</option>
                        @foreach ($departments as $department)
                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" id="submitBtn" class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded">
                    Submit
                </button>
            </form>

            <!-- "Please wait" message -->
            <div class="loading text-center text-lg mt-4" id="loadingMsg" style="display: none;">
                Please wait while waiting for the response...
            </div>

            <script>
                $(document).ready(function() {
                    // Hide the "please wait" message by default
                    $('#loadingMsg').hide();

                    // Handle form submission using Ajax
                    $('#createOfficeForm').submit(function(event) {
                        event.preventDefault();

                        // Show the "please wait" message
                        $('#loadingMsg').show();

                        // Send the Ajax request
                        $.ajax({
                            url: '/office', // Replace this with the correct URL of your route
                            type: 'POST',
                            data: $(this).serialize(),
                            dataType: 'json',
                            success: function(response) {
                                // Hide the "please wait" message
                                $('#loadingMsg').hide();

                                // Handle the success response (you can customize this part)
                                if (response.success) {
                                    alert('Office created successfully!');
                                    // Optionally, redirect to a success page or update the UI
                                } else {
                                    alert('Failed to create office. Please try again later.');
                                    // Optionally, display specific error messages
                                }
                            },
                            error: function() {
                                // Hide the "please wait" message
                                $('#loadingMsg').hide();

                                // Handle the error response (you can customize this part)
                                alert('An error occurred while processing your request. Please try again later.');
                            }
                        });
                    });
                });
            </script>
            </div>
      </div>
      <div>
    </div>

  
  

</div>
    
@endsection