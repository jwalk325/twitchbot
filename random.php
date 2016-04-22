<?php
// Scrape the web page.
$url = "https://www.hotslogs.com/Player/Profile?PlayerID=170110";
$url_raw_data = file_get_contents($url);

// Convert to a list so easier to find what we are looking for later.
$url_split_data = preg_split("/\n/", $url_raw_data);

// Go through the lines.
foreach ($url_split_data as &$line)
{
  // Find Raynor
  if (preg_match("/title=\"Raynor\"/", $line))
  {
    // Extract and display the win percent.
    $matches = array();
    preg_match("/<td class=\"rgSorted\">(\d+\.\d+)/", $line, $matches);
    echo "Win Percent: ".$matches[1];
  }
}
?>
