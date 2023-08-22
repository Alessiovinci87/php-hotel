<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Hotel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #003990;
            color: white; 
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>PHP Hotel</h1>
        
        <form action="" method="GET">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="has_parking" id="has_parking">
                <label class="form-check-label" for="has_parking">
                    Only Hotels with Parking
                </label>
            </div>
            <div class="form-group mb-3">
                <label for="min_vote">Minimum Vote:</label>
                <input type="number" class="form-control" id="min_vote" name="min_vote" min="1" max="5">
            </div>
            <button type="submit" class="btn btn-primary">Apply Filter</button>
        </form>
        
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Parking</th>
                    <th>Vote</th>
                    <th>Distance to Center</th>
                </tr>
            </thead>
            <tbody>
            <?php

$hotels = [

    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],

];



                $filterHasParking = isset($_GET['has_parking']) && $_GET['has_parking'] === 'on';
                $minVote = isset($_GET['min_vote']) ? (int)$_GET['min_vote'] : null;

                foreach ($hotels as $hotel) {
                    if (($filterHasParking && !$hotel['parking']) || ($minVote !== null && $hotel['vote'] < $minVote)) {
                        continue; 
                    }
                    echo "<tr>";
                    echo "<td>" . $hotel['name'] . "</td>";
                    echo "<td>" . $hotel['description'] . "</td>";
                    echo "<td>" . ($hotel['parking'] ? 'Yes' : 'No') . "</td>";
                    echo "<td>" . $hotel['vote'] . "</td>";
                    echo "<td>" . $hotel['distance_to_center'] . " km</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        
        
    </div>

   
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>

