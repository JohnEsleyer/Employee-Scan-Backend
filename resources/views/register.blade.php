<div id="register-form">
    <div>
        <label for="name">Name</label>
        <input id="name" type="text" name="name" required autofocus>
        <span id="name-error" class="error"></span>
    </div>

    <div>
        <label for="email">Email</label>
        <input id="email" type="email" name="email" required>
        <span id="email-error" class="error"></span>
    </div>

    <div>
        <label for="password">Password</label>
        <input id="password" type="password" name="password" required>
        <span id="password-error" class="error"></span>
    </div>

    <div>
        <label for="password_confirmation">Confirm Password</label>
        <input id="password_confirmation" type="password" name="password_confirmation" required>
        <span id="password_confirmation-error" class="error"></span>
    </div>

    <div>
        <button id="register-btn" type="button">Register</button>
    </div>
</div>

<div id="register-result"></div>

<script>
        document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('register-btn').addEventListener('click', function() {
            var name = document.getElementById('name').value;
            var email = document.getElementById('email').value;
            var password = document.getElementById('password').value;
            var password_confirmation = document.getElementById('password_confirmation').value;

            var xhr = new XMLHttpRequest();
            xhr.open('POST', '{{ route('register') }}', true);
            xhr.setRequestHeader('Content-Type', 'application/json');
            xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
            xhr.onload = function() {
                if (xhr.status === 422) {
                    try {
                        var response = JSON.parse(xhr.responseText);
                        console.log(response);
                    } catch (error) {
                        console.error('Error parsing JSON response:', error);
                    }
                } else if (xhr.status === 200) {
                    try {
                        var response = JSON.parse(xhr.responseText);
                        if (response.success) {
                            document.getElementById('register-form').style.display = 'none';
                            document.getElementById('register-result').textContent = 'Registration successful!';
                        } else {
                            document.getElementById('password-error').textContent = response.errors.password || '';
                            document.getElementById('password_confirmation-error').textContent = response.errors.password_confirmation || '';
                        }
                    } catch (error) {
                        console.error('Error parsing JSON response:', error);
                    }
                } else {
                    console.error('Error:', xhr.status);
                }
            };
            var data = JSON.stringify({name: name, email: email, password: password, password_confirmation: password_confirmation});
            xhr.send(data);
        });
    });

</script>
