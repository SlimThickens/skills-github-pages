<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $playerName = $_POST["playerName"];
  $score = $_POST["score"];

  // Load existing scores from the file
  $highScores = json_decode(file_get_contents('highscores.json'), true) ?: [];

  // Add the new score
  $highScores[] = ['playerName' => $playerName, 'score' => $score];

  // Sort the scores in ascending order (fewest days)
  usort($highScores, function ($a, $b) {
    return $a['score'] - $b['score'];
  });

  // Save the updated scores back to the file
  file_put_contents('highscores.json', json_encode($highScores));

  echo "Score saved successfully!";
}
?>
