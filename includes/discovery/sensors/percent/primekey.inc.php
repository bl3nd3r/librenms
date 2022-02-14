<?php

/*
 *
 * OIDs described here:
 * https://doc.primekey.com/ejbca-appliance/operations/webconf-configurator-of-hardware-appliance/monitoring
 *
*/

$usage = snmp_get($device, '.1.3.6.1.4.1.22408.1.1.2.1.4.118.100.98.49.1', '-Oqv');
if (is_numeric($usage) && $usage > '0') {
    $descr = 'Database Usage';
    discover_sensor($valid['sensor'],
                    'percent',  // class
                    $device,    // device
                    '.1.3.6.1.4.1.22408.1.1.2.1.4.118.100.98.49.1', // oid
                    '49',       // index
                    'primekey', // type
                    $descr,     // descr
                    1,          // divisor
                    1,          // multiplier
                    null,       // low_limit
                    null,       // low_warn_limit
                    80,         // warn_limit
                    100,        // high_limit
                    $usage      // current
                );
}
