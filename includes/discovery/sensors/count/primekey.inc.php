<?php

/*
 *
 * OIDs described here:
 * https://doc.primekey.com/ejbca-appliance/operations/webconf-configurator-of-hardware-appliance/monitoring
 *
*/

$transaction = snmp_get($device, '.1.3.6.1.4.1.22408.1.1.2.1.8.99.108.117.115.116.101.114.54.1', '-Oqv');
if (is_numeric($transaction) && $transaction > '0') {
    $descr = 'Transaction ID';
    discover_sensor($valid['sensor'],
                    'count',     // class
                    $device,     // device
                    '.1.3.6.1.4.1.22408.1.1.2.1.8.99.108.117.115.116.101.114.54.1', // oid
                    '54',        // index
                    'primekey',  // type
                    $descr,      // descr
                    1,           // divisor
                    1,           // multiplier
                    null,        // low_limit
                    null,        // low_warn_limit
                    null,        // warn_limit
                    null,        // high_limit
                    $transaction // current
                );
}
