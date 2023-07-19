@extends('layouts.app')

@section('content')
    @include('layouts.navbar')
    <div class="flex flex-row ml-72">
        <div class="flex flex-col w-1/4">
          <div class="container bg-white rounded-lg m-4 shadow-lg p-6 w-full">
            <h1 class="font-bold">Employee's DTR</h1>
            <hr class="my-3 h-0.5 border-t-0 bg-gray-400 opacity-100 dark:opacity-100"/>            
            
            {{-- Department DTR --}}
            <!-- Select Department -->
            <label for="underline_select" class="sr-only">Underline select</label>
            <select id="department_select" class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-gray-200 appearance-none peer">
                <option selected class="text-gray-500">Department</option>
                {{-- <option value="a">a1</option> --}}
                @foreach ($departments as $department)
                <option value="{{ $department->id }}">{{ $department->department_name }} </option>
                @endforeach
            </select>
            <br>
            <!-- Select Year -->
            {{-- Department DTR --}}
            <label for="underline_select" class="sr-only">Underline select</label>
            <select id="underline_select" class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-gray-200 appearance-none peer">
                {{-- <option selected class="text-gray-500">Year</option> --}}
                {{-- <option value="a">a1</option> --}}
                @for ($i = 0; $i < 6; $i++)
                    @php
                        $year = date('Y') - $i;
                    @endphp
                    <option value="{{ $year }}" {{ $year === date('Y') ? 'selected' : '' }}>{{ $year }}</option>
                @endfor
            </select>


            <br>

            <!-- Select Month -->
            {{-- Department DTR --}}
            <label for="underline_select" class="sr-only">Underline select</label>
            <select id="underline_select" class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-gray-200 appearance-none peer">
                {{-- <option selected class="text-gray-500">Month</option> --}}
                {{-- <option value="a">a1</option> --}}
                @for ($month = 0; $month < 12; $month++)
                    <option value="{{ $month }}" {{ $month === (date('n') - 1) ? 'selected' : '' }}>{{ date('F', mktime(0, 0, 0, $month + 1, 1)) }}</option>
                @endfor
            </select>
          </div>
          
        </div>
        <div class="container bg-white rounded-lg m-4 shadow-lg p-6 w-full ml-10">
          <div class="flex items-center justify-between">
            <h1 class="font-bold">Employees</h1>

            <!-- Search Employee -->
            <form id="searchForm">   
              <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
              <div class="relative">
                  <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                  </div>
                  @csrf
                  <input type="search" id="keyword" class="block w-full p-2.5 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50" placeholder="Search by first name or last name" required>
                  <button type="submit" class="text-white absolute right-1 bottom-1 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-2">
                  
                    <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                  </button>
              </div>
            </form>
            <div id="loading" style="display: none;">Please wait...</div>
            <script src="{{ asset('js/app.js') }}"></script>


          </div>
          <hr class="my-3 h-0.5 border-t-0 bg-gray-400 opacity-100 dark:opacity-100"/>
          <div id="results" class="overflow-y-auto h-200">
            
          </div>


          <script>
            let department_id;
            document.getElementById('department_select').addEventListener('change', function() {
                department_id = this.value;
                console.log('Selected value:', department_id);
            });

            document.getElementById('searchForm').addEventListener('submit', function(event) {
                event.preventDefault(); // Prevent form submission

                var keyword = document.getElementById('keyword').value;

                var resultsDiv = document.getElementById('results');
                var loadingDiv = document.createElement('div');
                loadingDiv.className = 'overflow-y-auto h-200';
                loadingDiv.innerHTML = '<div class="block w-full p-1 mb-2 pl-3 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100">' +
                    '<h5 class="text-lg font-bold tracking-tight text-gray-900">Please wait...</h5>' +
                    '</div>';

                resultsDiv.innerHTML = '';
                resultsDiv.appendChild(loadingDiv);

                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('dtr.search') }}', true);
                xhr.setRequestHeader('Content-Type', 'application/json');
                xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));

                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4) {
                        resultsDiv.innerHTML = ''; // Clear previous loading message

                        if (xhr.status === 200) {
                            var employees = JSON.parse(xhr.responseText);

                            if (employees.length === 0) {
                                resultsDiv.innerHTML = '<p>No employees found.</p>';
                            } else {
                                employees.forEach(function(employee) {
                                    var resultItem = document.createElement('a');
                                    resultItem.className = 'block w-full p-1 mb-2 pl-3 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100';
                                    resultItem.href = '#';
                                    resultItem.addEventListener('click', function() {
                                        console.log('Clicked employee:', employee.first_name + ' ' + employee.last_name);
                                    });

                                    var h5 = document.createElement('h5');
                                    h5.className = 'text-lg font-bold tracking-tight text-gray-900';
                                    h5.textContent = employee.first_name + ' ' + employee.last_name;

                                    var p = document.createElement('p');
                                    p.className = 'font-light text-sm text-gray-500';
                                    p.textContent = employee.department;

                                    resultItem.appendChild(h5);
                                    resultItem.appendChild(p);
                                    resultsDiv.appendChild(resultItem);
                                });
                            }
                        } else {
                            console.error('Error: ' + xhr.status);
                        }
                    }
                };

                var requestData = JSON.stringify({
                    keyword: keyword,
                    department_id: department_id
                });

                xhr.send(requestData);
            });
        </script>


        </div>
    </div>
    
@endsection