<?php

/*
 *
 * OIDs described here:
 * https://doc.primekey.com/ejbca-appliance/operations/webconf-configurator-of-hardware-appliance/monitoring
 *
*/

$oids = [
    52 => [
        'descr' => 'Carrier Battery',
        'oid'   => '.1.3.6.1.4.1.22408.1.1.2.2.4.104.115.109.52.1',
        'group' => 'HSM',
    ],
    55 => [
        'descr' => 'External Battery',
        'oid'   => '.1.3.6.1.4.1.22408.1.1.2.2.4.104.115.109.55.1',
        'group' => 'HSM',
    ],
];

$class = 'voltage';

$type = 'primekey';
$divisor = 1;
$multiplier = 1;
$low_limit = null;
$low_warn_limit = null;
$warn_limit = null;
$high_limit = null;
$poller_type = 'snmp';
$entPhysicalIndex = null;
$entPhysicalIndex_measured = null;
$user_func = 'first_word';  // Strip the units (' V') off the returned value

$transaction = snmp_get_multi_oid($device, array_column($oids, 'oid'));

foreach ($oids as $index => $entry) {
    $oid = $entry['oid'];
    $descr = $entry['descr'];
    $group = $entry['group'];
    $user_func = $entry['user_func'];

    if (! empty($transaction)) {
        $current = $transaction[$oid];

        if (is_numeric(first_word($current))) {
            discover_sensor($valid['sensor'],
                            $class,
                            $device,
                            $oid,
                            $index,
                            $type,
                            $descr,
                            $divisor,
                            $multiplier,
                            $low_limit,
                            $low_warn_limit,
                            $warn_limit,
                            $high_limit,
                            $current,
                            $poller_type,
                            $entPhysicalIndex,
                            $entPhysicalIndex_measured,
                            $user_func,
                            $group
                            );
        }
    }
}
unset($oids, $transaction, $class, $oid, $index, $type, $descr,
       $divisor, $multiplier, $low_limit, $low_warn_limit, $warn_limit,
       $high_limit, $current, $poller_type, $entPhysicalIndex,
       $entPhysicalIndex_measured, $user_func, $group);
