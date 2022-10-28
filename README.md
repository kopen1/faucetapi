Faucet Api
===============
- Get Balance 
- Get Currency List
- Check Wallet Address 
- Check List Payouts
- Send payment 



Requirements
------------

> PHP (7.1+)

> For PHP (5.3+) please refer to version `1.0`.


Usage
-----

```php
use irkop\faucet;

  $data['api'] = "Your Api";
  $data['address'] = "wallet address";
  $data['wallet'] = 'doge'; //currency 
  $data['count'] = 100; //count check payouts 
  $data['amount'] = 10; // delivery quantity [10 = 10 Satoshi]
  
$app = new faucetpay($data);

// Cek Balance
$app->balance();

// Validasi address 
$app->address();

// Check Payouts
$app->payout();

// Send payment  
$app->send();

```

