<?php

return [
    'serverKey' => env('MIDTRANS_SERVER_KEY', 'SB-Mid-server-nbZiu4GiQ4_8LK5zNlcGbZ3b'),
    'clientKey' => env('MIDTRANS_CLIENT_KEY', 'SB-Mid-client-p3jRknj0t_p-pJbO'),
    'isProduction' => false, // true untuk mode live
    'isSanitized' => true,
    'is3ds' => true,
];
