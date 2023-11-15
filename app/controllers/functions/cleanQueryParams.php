<?php
    function cleanQueryParam($query) {
        $decodedUrl = urldecode($query);

        $cleanedTitle = str_replace(' ', '-', $decodedUrl);
        $cleanedTitle = preg_replace('/-+/', '-', $cleanedTitle);

        return $cleanedTitle;
    }

    function reverseCleanQueryParam($cleanedTitle) {
        $reversedTitle = str_replace('-', ' ', $cleanedTitle);
        $reversedTitle = preg_replace('/\s+/', ' ', $reversedTitle);
    
        return $reversedTitle;
    }
?>