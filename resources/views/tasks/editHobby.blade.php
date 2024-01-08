<!-- resources/views/tasks/editHobby.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Hobby</title>
</head>
<body>
    <h1>Edit Hobby</h1>

    <form method="post" action="{{ route('tasks.hobbies.update',  $hobby->id) }}">
        @csrf
     
        <label for="hobby_name">Hobby Name:</label>
        <input type="text" name="hobby_name" value="{{ $hobby->hobby }}" required>

        <!-- Add other fields as needed -->

        <button type="submit">Update Hobby</button>
    </form>
</body>
</html>
