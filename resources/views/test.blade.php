
@extends('layouts.app')

@section('content')
<div>
    <h1>Search Employees</h1>

    <form id="searchForm">
        <input type="text" id="keyword" placeholder="Search by first name or last name" required>
        <button type="submit">Search</button>
    </form>

    <div id="results"></div>
    <div id="loading" style="display: none;">Please wait...</div>

    <script>
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
                            resultItem.href = '';

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

        xhr.send(JSON.stringify({ keyword: keyword }));
    });
</script>

</div>
</html>
@endsection