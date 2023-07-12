@extends('layouts.app')

@section('content')
    <div class="flex h-screen bg-gray-200">
        <!-- Navigation Bar -->
        <div class="w-1/4 bg-sky-950  text-white shadow-lg">
            <div class="p-4 flex justify-center">
                <span class="text-xl font-bold">Dashboard</span>
            </div>
            <div class="flex justify-center p-4">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                        Logout
                    </button>
                </form>
            </div>
        </div>

        <!-- Main Content -->
        <div class="w-3/4 grid grid-cols-1 w-full max-h-screen overflow-auto">
            <!-- Section 1 -->
            <div class="w-1/3 bg-white rounded-lg m-4 shadow-lg p-6 w-full">
            <h2 class="text-xl font-bold mb-4">Employees</h2>
            <table class="w-full text-left">
                <thead class="text-xs uppercase bg-gray-50">
                    <tr>
                        <th class="py-2">ID</th>
                        <th class="py-2">First Name</th>
                        <th class="py-2">Last Name</th>
                        <th class="py-2">Department ID</th>
                        <th class="py-2 hidden">.</th>
                        <!-- Add more table headers if needed -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($employees as $employee)
                    <tr>
                        <td class="py-2">{{ $employee->id }}</td>
                        <td class="py-2">{{ $employee->first_name }}</td>
                        <td class="py-2">{{ $employee->last_name }}</td>
                        <td class="py-2">{{ $employee->department_id}}</td>
                        <td class="py-2 text-right">
                            <form action="{{ route('employees.destroy', $employee->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">Delete</button>
                            </form> 
                        </td>
                        <!-- Add more table cells for other employee data -->
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>


            <!-- Section 2 -->
             <div class="w-1/3 bg-white rounded-lg m-4 shadow-lg p-6 w-full">
            <h2 class="text-xl font-bold mb-4">Attendance</h2>
            <table class="w-full text-left">
                <thead class="text-xs uppercase bg-gray-50">
                    <tr>
                        <th class="py-2">ID</th>
                        <th class="py-2">Employee ID</th>
                        <th class="py-2">Office ID</th>
                        <th class="py-2">Time In AM</th>
                        <th class="py-2">Time Out AM</th>
                        <th class="py-2">Time In PM</th>
                        <th class="py-2">Time Out PM</th>
                        <th class="py-2 hidden">.</th>

                        <!-- Add more table headers if needed -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($attendances as $attendance)
                    <tr>
                        <td class="py-2">{{ $attendance->id }}</td>
                        <td class="py-2">{{ $attendance->employee_id }}</td>
                        <td class="py-2">{{ $attendance->office_id}}</td>
                        <td class="py-2">{{ $attendance->time_in_am}}</td>
                        <td class="py-2">{{ $attendance->time_out_am}}</td>
                        <td class="py-2">{{ $attendance->time_in_pm}}</td>
                        <td class="py-2">{{ $attendance->time_out_pm}}</td>

                        <td class="py-2 text-right">
                            <form action="{{ route('attendances.destroy', $attendance->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">Delete</button>
                            </form> 
                        </td>
                        <!-- Add more table cells for other employee data -->
                    </tr>
                    @endforeach
                    </tbody>
                </table>
          
        </div>

            <!-- Section 3 -->
            <div class="w-1/3 bg-white rounded-lg m-4 shadow-lg p-6 w-full">
                <h2 class="text-xl font-bold mb-4">Add Employee</h2>
                <form action="{{ route('employees.store') }}" method="POST">
                    @csrf
                    <div>
                        <label for="first_name">First Name:</label>
                        <input class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-white-600 dark:border-white-600 dark:placeholder-gray-400 dark:text-gray dark:focus:ring-blue-500 dark:focus:border-blue-500" type="text" name="first_name" id="first_name">
                    </div>
                    <div>
                        <label for="last_name">Last Name:</label>
                        <input class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-white-600 dark:border-white-600 dark:placeholder-gray-400 dark:text-gray dark:focus:ring-blue-500 dark:focus:border-blue-500" type="text" name="last_name" id="last_name">
                    </div>
                    <div>
                        <label for="company_id">Department ID</label>
                        <input class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-white-600 dark:border-white-600 dark:placeholder-gray-400 dark:text-gray dark:focus:ring-blue-500 dark:focus:border-blue-500", type="number" name="department_id" id="department_id">
                    </div>
                    <!-- Add more input fields if needed -->

                    <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">Submit</button>
                </form>

            </div>
        </div>
    </div>
@endsection
