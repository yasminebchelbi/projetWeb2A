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
    <title>Event List</title>
</head>

<body>
    <a href="addevent.php">Add New Event</a>
    <table  border>
        <tr>
            <th>IdEvent</th>
            <th>Title</th>
            <th>Type</th>
            <th>Date</th>
            <th>Address</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
        <?php
        foreach ($list as $event) {
        ?>
            <tr>
                <td><?= $event['idEvent']; ?></td>
                <td><?= $event['titre']; ?></td>
                <td><?= $event['type']; ?></td>
                <td><?= $event['date']; ?></td>
                <td><?= $event['adresse']; ?></td>
                <td><?= $event['description']; ?></td>

                <td>
                    <!-- Update event button -->
                    <form method="POST" action="updateevent.php">
                        <input type="submit" name="update" value="Update">
                        <input type="hidden" value="<?= $event['idEvent']; ?>" name="idEvent">
                    </form>
                    <!-- Delete event link -->
                    <a href="deletevent.php?idEvent=<?= $event['idEvent']; ?>">Delete</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>