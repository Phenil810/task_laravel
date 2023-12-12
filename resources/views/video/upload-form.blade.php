<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Upload Form</title>
</head>
<body>
    <h1>Video Upload Form</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <form action="{{ url('/upload') }}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="title">Title:</label>
        <input type="text" name="title" required>
        <br>
        <label for="video">Select video (max 10MB):</label>
        <input type="file" name="video" accept="video/*" required>
        <br>
        <button type="submit">Upload</button>
    </form>
</body>
</html>
