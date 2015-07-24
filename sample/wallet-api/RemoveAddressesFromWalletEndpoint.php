<?php

// Run on console:
// php -f .\sample\wallet-api\RemoveAddressesFromWalletEndpoint.php

require __DIR__ . '/../bootstrap.php';

use BlockCypher\Api\AddressList;
use BlockCypher\Auth\SimpleTokenCredential;
use BlockCypher\Client\WalletClient;
use BlockCypher\Rest\ApiContext;

$apiContext = ApiContext::create(
    'main', 'btc', 'v1',
    new SimpleTokenCredential('c0afcccdde5081d6429de37d16166ead'),
    array('mode' => 'sandbox', 'log.LogEnabled' => true, 'log.FileName' => 'BlockCypher.log', 'log.LogLevel' => 'DEBUG')
);

$walletClient = new WalletClient($apiContext);
// List of addresses to be removed from the wallet
$addressList = AddressList::fromAddressesArray(array(
    "13cj1QtfW61kQHoqXm3khVRYPJrgQiRM6j"
));
$walletClient->removeAddresses('alice', $addressList);

ResultPrinter::printResult("Remove Addresses From Wallet Endpoint", "Wallet", 'alice', $addressList, $wallet);