
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Complaints View</title>
 <link rel="stylesheet" href="admin2.css">
</head>
<body>
    <h2>Complaints Received</h2>
    <ul id="complaintList"></ul>

    <script>
        function loadComplaints() {
            let complaints = JSON.parse(localStorage.getItem("complaints")) || [];
            let list = document.getElementById("complaintList");
            list.innerHTML = "";

            complaints.forEach((c, index) => {
                // Create list item for each complaint
                let li = document.createElement("li");

                // Extracting name and complaint text (without timestamp)
                let name = c.name;
                let complaintText = c.complaint;

                // Setting the text content to include only name and complaint
                li.textContent = `Complaint ${index + 1} by ${name}: ${complaintText}`;
                list.appendChild(li);
            });
        }

        // Load complaints when the admin page is opened
        loadComplaints();
    </script>
</body>
</html>
