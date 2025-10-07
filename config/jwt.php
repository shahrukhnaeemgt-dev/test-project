<?php

return [
    'ttl' => (int) env('JWT_TTL', 60),
    'refresh_ttl' => (int) env('JWT_REFRESH_TTL', 60),
];
