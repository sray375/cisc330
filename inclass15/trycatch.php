<?php
try {
    echo 'Finding an error...<br>';
    
    // Simulating an error
    if (true) {
        throw new Exception('Custom error message!');
    }
} catch (Exception $e) { // Catching Exception instead of Error
    echo 'Caught exception: ' . $e->getMessage();
}
