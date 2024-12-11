<?php
include "../../controller/eventcontroller.php";

$eventC = new eventcontroller();
$list = $eventC->eventList();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .event-container {
            width: 90%;
            margin: 20px auto;
        }

        .event-card {
            display: flex;
            align-items: center;
            background: #fff;
            border-radius: 10px;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            justify-content: center; /* Center content horizontally */
        }

        .event-details {
            padding: 20px;
            color: #333;
            text-align: center; /* Center text inside */
            width: 80%; /* Adjust width for better text spacing */
        }

        .event-details h2 {
            font-size: 2rem; /* Enlarged title size */
            color: #28a745;
            margin-bottom: 15px;
        }

        .event-details p {
            font-size: 1.2rem; /* Enlarged font size */
            margin: 10px 0;
        }

        .event-details strong {
            color: #28a745;
        }

        .view-details {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 20px;
            background-color: #28a745;
            color: #fff;
            font-size: 1.2rem;
            text-decoration: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .view-details:hover {
            background-color: #218838;
        }
    </style>
</head>

<body>
    <div class="event-container">
        <?php foreach ($list as $event): ?>
        <div class="event-card">
            <div class="event-details">
                <h2><?= $event['titre']; ?></h2>
                <p><strong>Type:</strong> <?= $event['type']; ?></p>
                <p><strong>Date:</strong> <?= $event['date']; ?></p>
                <p><strong>Adresse:</strong> <?= $event['adresse']; ?></p>
                <p><strong>Description:</strong> <?= $event['description']; ?></p>
                <!-- Bouton View Details -->
                <a class="view-details" href="event_details.php?idEvent=<?= $event['idEvent']; ?>">View Details</a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</body>

</html>
