<?php

namespace Yengec\Entities;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Carbon;

class Subscription implements Arrayable
{
    public ?string $userId = null;
    public ?string $packageId = null;
    public ?string $channel = null;
    public ?Carbon $renewalAt = null;
    public ?string $canceledAt = null;
    public ?float $price = null;
    public int $renewMonth = 1;
    public string $paymentMethod = 'partnership';
    public string $companyId;

    /**
     * @return string
     */
    public function getCompanyId(): string
    {

        return $this->companyId;
    }


    /**
     * @param  string  $companyId
     */
    public function setCompanyId(string $companyId): void
    {

        $this->companyId = $companyId;
    }

    /**
     * @return string
     */
    public function getPaymentMethod(): string
    {

        return $this->paymentMethod;
    }


    /**
     * @param  string  $paymentMethod
     */
    public function setPaymentMethod(string $paymentMethod): void
    {

        $this->paymentMethod = $paymentMethod;
    }

    /**
     * @return int
     */
    public function getRenewMonth(): int
    {
        return $this->renewMonth;
    }


    /**
     * @param  int  $renewMonth
     */
    public function setRenewMonth(int $renewMonth): void
    {

        $this->renewMonth = $renewMonth;
    }

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
    public function getPackageId(): ?string
    {
        return $this->packageId;
    }

    /**
     * @param  string|null  $packageId
     */
    public function setPackageId(?string $packageId): void
    {
        $this->packageId = $packageId;
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

    /**
     * @return Carbon|null
     */
    public function getRenewalAt(): ?Carbon
    {
        return $this->renewalAt;
    }

    /**
     * @param  Carbon|null  $renewalAt
     */
    public function setRenewalAt(?Carbon $renewalAt): void
    {
        $this->renewalAt = $renewalAt;
    }


    /**
     * @return string|null
     */
    public function getCanceledAt(): ?string
    {
        return $this->canceledAt;
    }

    /**
     * @param  string|null  $canceledAt
     */
    public function setCanceledAt(?string $canceledAt): void
    {
        $this->canceledAt = $canceledAt;
    }

    /**
     * @return float|null
     */
    public function getPrice(): ?float
    {
        return $this->price;
    }

    /**
     * @param  float|null  $price
     */
    public function setPrice(?float $price): void
    {
        $this->price = $price;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'user_id' => $this->getUserId(),
            'package_id' => $this->getPackageId(),
            'channel' => $this->getChannel(),
            'renewal_at' => optional($this->getRenewalAt())->toDateTimeString(),
            'canceled_at' => optional($this->getCanceledAt())->toDateTimeString(),
            'price' => $this->getPrice(),
            'renew_month' => $this->getRenewMonth(),
            'payment_method' => $this->getPaymentMethod(),
            'company_id' => $this->getCompanyId()
        ];
    }
}
