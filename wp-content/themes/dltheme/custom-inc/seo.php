<?php
namespace AIOSEO\Plugin\Pro\Meta;
function getSEODesc() {
  if (function_exists('aioseo')) {
    // Import the Description class with the correct namespace
  
  
    // Get the term ID (assuming you have the term object)
    $term_id = $terms[0]->term_id;
  
    // Instantiate the Description class (if necessary) and get the description
    $description = Description::getDescription('term', $term_id);
  
    // Output the description
    echo $description;
  } else {
    echo 'AIOSEO is not active.';
  }
}