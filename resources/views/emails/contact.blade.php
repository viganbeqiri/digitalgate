<p>You have received a new contact form submission:</p>
<ul>
    <li><strong>Name:</strong> {{ $data['first_name'] }} {{ $data['last_name'] }}</li>
    <li><strong>Email:</strong> {{ $data['email'] }}</li>
</ul>
<p><strong>Message:</strong></p>
<p>{{ $data['message'] }}</p>
