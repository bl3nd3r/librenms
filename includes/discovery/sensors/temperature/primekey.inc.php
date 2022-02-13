<?php

$temperature = snmp_get($device, '.1.3.6.1.4.1.22408.1.1.2.1.3.99.112.117.1', '-Oqv');
if (is_numeric($temperature) && $temperature > '0') {
    $descr = 'CPU Temperature';
    discover_sensor($valid['sensor'],
                    'temperature',     // class
                    $device,           // device
                    '.1.3.6.1.4.1.22408.1.1.2.1.3.99.112.117.1', // oid
                    '117',             // index
                    'primekey',        // type
                    $descr,            // descr
                    1,                 // divisor
                    1,                 // multiplier
                    null,              // low_limit
                    null,              // low_warn_limit
                    null,              // warn_limit
                    null,              // high_limit
                    $temperature       // current
                );
}
