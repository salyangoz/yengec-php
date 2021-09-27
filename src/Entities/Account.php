<?php

namespace Yengec\Entities;

class Account
{
    public ?string $userId;
    public ?string $accessToken;
    public ?string $companyId;
    public ?string $channel;

    /**
     * @return string|null
     */
    public function getUserId(): ?string
    {
        return $this->userId;
    }

    /**
     * @param  string|null  $userId
     */
    public function setUserId(?string $userId): void
    {
        $this->userId = $userId;
    }

    /**
     * @return string|null
     */
    public function getAccessToken(): ?string
    {
        return $this->accessToken;
    }

    /**
     * @param  string|null  $accessToken
     */
    public function setAccessToken(?string $accessToken): void
    {
        $this->accessToken = $accessToken;
    }


    /**
     * @return string|null
     */
    public function getCompanyId(): ?string
    {

        return $this->companyId;
    }


    /**
     * @param  string|null  $companyId
     */
    public function setCompanyId(?string $companyId): void
    {
        $this->companyId = $companyId;
    }


    /**
     * @return string|null
     */
    public function getChannel(): ?string
    {
        return $this->channel;
    }


    /**
     * @param  string|null  $channel
     */
    public function setChannel(?string $channel): void
    {
        $this->channel = $channel;
    }
}
