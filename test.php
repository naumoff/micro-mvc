<?php
$url = 'http://www.example.com';


echo "<pre>";
print_r(get_headers($url));

print_r(get_headers($url, 1));