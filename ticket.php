<?php

class Ticket {
    private $eventName;
    private $venue;
    private $date;
    private $price;
    private $isBooked;

    public function __construct($eventName, $venue, $date, $price) {
        $this->eventName = $eventName;
        $this->venue = $venue;
        $this->date = $date;
        $this->price = $price;
        $this->isBooked = false;
    }

    public function bookTicket() {
        if ($this->isBooked) {
            return "Ticket is already booked.";
        } else {
            $this->isBooked = true;
            return "Ticket booked successfully.";
        }
    }

    public function cancelTicket() {
        if ($this->isBooked) {
            $this->isBooked = false;
            return "Ticket canceled successfully.";
        } else {
            return "Ticket is not booked yet.";
        }
    }

    public function generateTicket($customerName) {
        $ticketDetails = "Event Name: " . $this->eventName . "<br>";
        $ticketDetails .= "Venue: " . $this->venue . "<br>";
        $ticketDetails .= "Date: " . $this->date . "<br>";
        $ticketDetails .= "Price: $" . $this->price . "<br>";
        $ticketDetails .= "Customer Name: " . $customerName . "<br>";
        return $ticketDetails;
    }

    public function isTicketBooked() {
        return $this->isBooked;
    }
}

// Get input from user
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $eventName = isset($_POST["event_name"]) ? $_POST["event_name"] : "";
    $venue = isset($_POST["venue"]) ? $_POST["venue"] : "";
    $date = isset($_POST["date"]) ? $_POST["date"] : "";
    $price = isset($_POST["price"]) ? floatval($_POST["price"]) : 0;

    // Creating ticket object
    $ticket = new Ticket($eventName, $venue, $date, $price);

    $action = isset($_POST["action"]) ? $_POST["action"] : "";
    $message = "";

    if ($action == "book") {
        $message = $ticket->bookTicket();
    } elseif ($action == "cancel") {
        $message = $ticket->cancelTicket();
    }
} else {
    $message = "";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Booking System</title>
</head>
<body>
    <h2>Ticket Booking System</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="event_name">Event Name:</label>
        <input type="text" id="event_name" name="event_name" required>
        <br>
        <label for="venue">Venue:</label>
        <input type="text" id="venue" name="venue" required>
        <br>
        <label for="date">Date:</label>
        <input type="text" id="date" name="date" placeholder="YYYY-MM-DD" required>
        <br>
        <label for="price">Price:</label>
        <input type="number" id="price" name="price" min="0" required>
        <br>
        <button type="submit" name="action" value="book">Book Ticket</button>
        <button type="submit" name="action" value="cancel">Cancel Ticket</button>
    </form>
    <?php if ($message): ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>
</body>
</html>
