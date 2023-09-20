<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="event_insertion_style.css">
    <title>Admin Panel</title>
</head>

<body>
    <div class="admin-container">
        <h2>Add New Event</h2>
        <form action="http://localhost/hcfd/HCFD/insert_event.php" method="POST" enctype="multipart/form-data">
            <label for="author_name">Author Name:</label>
            <input type="text" id="author_name" name="author_name" required>

            <label for="title">Event Title:</label>
            <input type="text" id="title" name="title" required>

            <label for="description">Event Description:</label>
            <textarea id="description" name="description" rows="4" required></textarea>


            <label for="cover_image">Cover Image:</label>
            <input type="file" id="cover_image" name="cover_image" accept="image/*" required>

            <button type="submit">Add Event</button>
        </form>
    </div>
</body>

</html>