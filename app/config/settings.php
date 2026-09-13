<?php


return [
    # This is additional validation for the maximum size of a POST request. 
    # The value is in bytes. The default is 8192 bytes (8 KB). You can change this value to suit your needs.
    # Please keep the apache/nginx configuration in mind when changing this value. If you set this value too high, you may run into issues with your web server configuration.
    'max_posted_size' => 8192
];
