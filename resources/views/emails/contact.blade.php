<p><strong>From:</strong> {{ $data['name'] }} ({{ $data['email'] }})</p>
<p><strong>Topic:</strong> {{ $data['subject'] ?? 'Not specified' }}</p>
<hr>
<p>{{ $data['message'] }}</p>
