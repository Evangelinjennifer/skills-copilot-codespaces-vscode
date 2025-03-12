<!-- detail.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selected Books</title>
    <link rel="stylesheet" href="detail.css">
</head>
<body>
    <h1>Confirm Selected Books</h1>
    <div id="selectedBooks"></div>

    <h2>User Details</h2>

<div class='details-box'>
    <form method="POST" action="store_books.php">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="issue_date">Issue Date:</label>
        <input type="date" id="issue_date" name="issue_date" required><br>

        <label for="return_date">Return Date:</label>
        <input type="date" id="return_date" name="return_date" required><br>

        <input type="hidden" id="selectedBooksInput" name="selectedBooks">
        <button type="submit">Submit</button>
    </form>
    </div>
 <button onclick='history.back()' style='margin-top: 20px; padding: 10px 15px; font-size: 16px; cursor: pointer;'>Go Back</button>

    <script>
        const selectedBooks = JSON.parse(localStorage.getItem('selectedBooks')) || [];
        document.getElementById('selectedBooks').innerText = selectedBooks.join(", ");
        document.getElementById('selectedBooksInput').value = JSON.stringify(selectedBooks);
    </script>
</body>
</html>
