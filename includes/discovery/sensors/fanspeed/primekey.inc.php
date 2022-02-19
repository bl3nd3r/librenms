<?php
/*
 * LibreNMS fanspeed sensor for PrimeKey Hardware Appliances
 *
 * This program is free software: you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the
 * Free Software Foundation, either version 3 of the License, or (at your
 * option) any later version.  Please see LICENSE.txt at the top level of
 * the source code distribution for details.
 *
 * The OIDs described here, for the EJBCA Appliance:
 * https://doc.primekey.com/ejbca-appliance/operations/webconf-configurator-of-hardware-appliance/monitoring
 *
 * @package    LibreNMS
 * @subpackage webui
 * @link       https://www.librenms.org
 * @copyright  2022 LibreNMS
 * @author     LibreNMS Contributors
 */

$oids = [
    49 => [
        'descr' => 'CPU Fan',
        'oid'   => '.1.3.6.1.4.1.22408.1.1.2.1.4.102.97.110.49.1',
        'group' => 'CPU',
    ],
    50 => [
        'descr' => 'System Fan 1',
        'oid'   => '.1.3.6.1.4.1.22408.1.1.2.1.4.102.97.110.50.1',
        'group' => 'System',
    ],
    51 => [
        'descr' => 'System Fan 2',
        'oid'   => '.1.3.6.1.4.1.22408.1.1.2.1.4.102.97.110.51.1',
        'group' => 'System',
    ],
    52 => [
        'descr' => 'System Fan 3',
        'oid'   => '.1.3.6.1.4.1.22408.1.1.2.1.4.102.97.110.52.1',
        'group' => 'System',
    ],
];

$class = 'fanspeed';

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
$user_func = null;

$transaction = snmp_get_multi_oid($device, array_column($oids, 'oid'));

foreach ($oids as $index => $entry) {
    $oid = $entry['oid'];
    $descr = $entry['descr'];
    $group = $entry['group'];

    if (! empty($transaction)) {
        $current = $transaction[$oid];

        if (is_numeric($current)) {
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
unset($transaction, $class, $oid, $index, $type, $descr, $divisor,
       $multiplier, $low_limit, $low_warn_limit, $warn_limit, $high_limit,
       $current, $poller_type, $entPhysicalIndex, $entPhysicalIndex_measured,
       $user_func, $group);
