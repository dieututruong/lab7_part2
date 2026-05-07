<!doctype html>
<html lang="en">
<head>
    <title>Booking Confirmation</title>
    <meta charset="utf-8">
    <meta name="description" content="Rohirrim Booking Confirmation">
    <meta name="keywords" content="MiddleEarth, Tours, Rohan">
    <meta name="author" content="Grima Wormtongue">
    <link rel="stylesheet" type="text/css" href="style/style.css">
</head>

<body>

<h1>Rohirrim Tour Booking Confirmation</h1>

<?php
function clean_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $firstname = isset($_POST["firstname"]) ? clean_input($_POST["firstname"]) : "";
    $lastname = isset($_POST["lastname"]) ? clean_input($_POST["lastname"]) : "";
    $age = isset($_POST["age"]) ? clean_input($_POST["age"]) : "";
    $species = isset($_POST["species"]) ? clean_input($_POST["species"]) : "";
    $food = isset($_POST["food"]) ? clean_input($_POST["food"]) : "";
    $bookday = isset($_POST["bookday"]) ? clean_input($_POST["bookday"]) : "";
    $partysize = isset($_POST["partysize"]) ? clean_input($_POST["partysize"]) : "";

    $speciesName = "";

    if ($species == "M") {
        $speciesName = "Human";
    } elseif ($species == "D") {
        $speciesName = "Dwarf";
    } elseif ($species == "E") {
        $speciesName = "Elf";
    } elseif ($species == "H") {
        $speciesName = "Hobbit";
    }

    $booking = array();

    if (isset($_POST["accom"])) {
        $booking[] = "Accommodation";
    }

    if (isset($_POST["4day"])) {
        $booking[] = "Four-day tour";
    }

    if (isset($_POST["10day"])) {
        $booking[] = "Ten-day tour";
    }

    if (count($booking) > 0) {
        $bookingText = implode(" and ", $booking);
    } else {
        $bookingText = "no tours";
    }

    echo "<p>Welcome " . $firstname . " " . $lastname . "!</p>";
    echo "<p>You are now booked on the " . $bookingText . "</p>";
    echo "<p>Species: " . $speciesName . "</p>";
    echo "<p>Age: " . $age . "</p>";
    echo "<p>Meal Preference: " . $food . "</p>";
    echo "<p>Booking Date: " . $bookday . "</p>";
    echo "<p>Number of travellers: " . $partysize . "</p>";

} else {
    echo "<p>Please submit the booking form first.</p>";
}
?>

</body>
</html>