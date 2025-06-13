<!DOCTYPE html>
<html>
<head>
    <title>Submit News</title>
</head>
<body>
    <h1>Submit News</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label>Title:</label><br>
        <input type="text" name="title" required><br><br>

        <label>Content:</label><br>
        <textarea name="content" rows="5" required></textarea><br><br>

        <label>Image (optional):</label><br>
        <input type="file" name="image"><br><br>

        <button type="submit">Submit News</button>
    </form>
</body>
</html>
