<?php
include('../../connection/db.php');

if (isset($_GET['can_id'])) {
    $can_id = intval($_GET['can_id']);

    // Query to fetch user data
    $query = mysqli_query($conn, "SELECT * FROM Candidates WHERE can_id = $can_id");
    if ($row = mysqli_fetch_assoc($query)) {
        // User information
        echo
            "<strong>Email:</strong> " . htmlspecialchars($row['Email']) . "<br>
              <strong>Username:</strong> " . htmlspecialchars($row['Username']) . "<br>
              <strong>First Name:</strong> " . htmlspecialchars($row['firstname']) . "<br>
              <strong>Last Name:</strong> " . htmlspecialchars($row['lastname']) . "<br>";

        // Fetch education details
        echo "<hr><h5>Education:</h5>";
        $edu_query = mysqli_query($conn, "SELECT * FROM education WHERE id_c = $can_id");
        if (mysqli_num_rows($edu_query) > 0) {
            while ($edu_row = mysqli_fetch_assoc($edu_query)) {
                echo "<strong>Degree:</strong> " . htmlspecialchars($edu_row['degree']) . "<br>
                      <strong>Institution:</strong> " . htmlspecialchars($edu_row['institution']) . "<br>
                      <strong>Start:</strong> " . htmlspecialchars($edu_row['debut']) . "<br>
                      <strong>End:</strong> " . htmlspecialchars($edu_row['fin']) . "<br><hr>";
            }
        } else {
            echo "No education data found.";
        }

        // Fetch skills details
        echo "<h5>Skills:</h5>";
        $sql = "SELECT category, GROUP_CONCAT(skill SEPARATOR ', ') AS skills 
                FROM skill 
                WHERE id_c = $can_id 
                GROUP BY category";

        $skills_query = mysqli_query($conn, $sql);
        if ($skills_query === false) {
            echo "Query execution failed: " . mysqli_error($conn);
        } else {
            if (mysqli_num_rows($skills_query) > 0) {
                while ($skills_row = mysqli_fetch_assoc($skills_query)) {
                    echo "<strong>Category:</strong> " . htmlspecialchars($skills_row['category']) . "<br>
                          <strong>Skills:</strong> " . htmlspecialchars($skills_row['skills']) . "<br><hr>";
                }
            } else {
                echo "No skills data found.";
            }
        }

        // Display CV information
        $cv = $row['cv']; // Fetch the CV filename
        echo "<h5 class='text-center'>CV:</h5>";
        if ($cv && $cv !== 'noCV.pdf') {
            echo "<div class='text-center'>
            <a href='cv_preview.php?cv=" . urlencode($cv) . "' class='btn btn-info'>View CV</a>
            
          </div>";

        } else {
            echo "<div class='text-center'>No CV uploaded.</div>";
        }




    }



}
?>