// These are utilities reused across the website,
//     rather than being dedicated to a single feature.

function clean_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}