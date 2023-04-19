<?php
include("connection/config.php");

// Define how many results to display per page
$results_per_page = 10;

// Get the total number of results in the database
$result = mysqli_query($conn, "SELECT COUNT(*) as total FROM tasks");
$row = mysqli_fetch_assoc($result);
$total_results = $row['total'];

// Calculate the total number of pages
$total_pages = ceil($total_results / $results_per_page);

// Get the current page number
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;

// Calculate the starting and ending results for the current page
$start_result = ($current_page - 1) * $results_per_page;
$end_result = $start_result + $results_per_page - 1;

// Get the results for the current page
$result = mysqli_query($conn, "SELECT * FROM tasks LIMIT $start_result, $results_per_page");

// Loop through the results and display them
while ($row = mysqli_fetch_assoc($result)) {
    echo $row['fname'] . " " . $row['lname'] . "<br>";
}

// Generate the pagination links
echo "<div class='pagination'>";
if ($current_page > 1) {
    echo "<a href='?page=".($current_page-1)."'>Previous</a>";
}
if ($current_page > 2) {
    echo "<a href='?page=1'>1</a>";
    if ($current_page > 3) {
        echo "<span>...</span>";
    }
}
for ($i = max(1, $current_page-1); $i <= min($total_pages, $current_page+1); $i++) {
    if ($i == $current_page) {
        echo "<span class='current'>$i</span>";
    } else {
        echo "<a href='?page=$i'>$i</a>";
    }
}
if ($current_page < $total_pages-1) {
    if ($current_page < $total_pages-2) {
        echo "<span>...</span>";
    }
    echo "<a href='?page=$total_pages'>$total_pages</a>";
}
if ($current_page < $total_pages) {
    echo "<a href='?page=".($current_page+1)."'>Next</a>";
}
echo "</div>";
?>