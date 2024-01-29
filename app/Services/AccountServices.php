<?php

namespace App\Services;

use App\Models\Account;

class AccountServices {
    public function paymentCreate($account_id, $ammount)
    {
        $account = Account::find($account_id);
        $account->balance = $account->balance + $ammount;
        $account->save();
    }

    public function paymentRemove($account_id, $oldAmmount)
    {
        $account = Account::find($account_id);
        $account->balance = $account->balance - $oldAmmount;
        $account->save();
    }
}