<?php

namespace Yengec;

use Yengec\Entities\Company;
use Yengec\Entities\Subscription;
use Yengec\Entities\User;

interface YengecInterface
{
    /**
     * @param  string  $channel
     * @param  User  $user
     * @param  Company  $company
     *
     * @return array
     */
    public function createAccount(string $channel, User $user, Company $company): array;

    /**
     * @param  Subscription  $subscription
     *
     * @return array
     */
    public function subscribe(Subscription $subscription): array;

    /**
     * @param  string  $accessToken
     */
    public function setAccessToken(string $accessToken): void;

    /**
     * @param  string  $subscriptionId
     */
    public function cancelSubscription(string $subscriptionId): void;


    /**
     * @param  string  $id
     */
    public function setCompanyId(string $id): void;
}
