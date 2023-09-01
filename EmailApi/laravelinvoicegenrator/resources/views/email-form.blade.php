<!DOCTYPE html>
<html>
<head>
    <title>Email Sending Form</title>
</head>
<body>
    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <form method="POST" action="/api/send-email" enctype="multipart/form-data">
        @csrf
        <label for="to">To:</label>
        <input type="email" name="to" required><br>
        <label for="message">Message:</label><br>
        <textarea name="message" required></textarea><br>
        <label for="attachment">Attachment (PDF only):</label>
        <input type="file" name="attachment" accept=".pdf" required><br>
        <button type="submit">Send Email</button>
    </form>
</body>
</html>
