<?php
// Load existing scores from the file
$highScores = json_decode(file_get_contents('highscores.json'), true) ?: [];

// Return the scores as JSON
header('Content-Type: application/json');
echo json_encode($highScores);
?>
