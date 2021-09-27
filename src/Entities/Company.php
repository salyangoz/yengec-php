<?php

namespace Yengec\Entities;

use Illuminate\Contracts\Support\Arrayable;

class Company implements Arrayable
{
    public string $name;
    public string $refId;
    public ?Address $address = null;
    public ?string $accounting = null;
    public string $taxOffice;
    public string $taxNumber;
    public ?string $logoBase64 = null;
    public ?string $logoUrl = null;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }


    /**
     * @param  string  $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }


    /**
     * @return string
     */
    public function getRefId(): string
    {
        return $this->refId;
    }


    /**
     * @param  string  $refId
     */
    public function setRefId(string $refId): void
    {
        $this->refId = $refId;
    }


    /**
     * @return ?Address
     */
    public function getAddress(): ?Address
    {
        return $this->address;
    }


    /**
     * @param  Address  $address
     */
    public function setAddress(Address $address): void
    {

        $this->address = $address;
    }


    /**
     * @return string|null
     */
    public function getAccounting(): ?string
    {
        return $this->accounting;
    }


    /**
     * @param  string|null  $accounting
     */
    public function setAccounting(?string $accounting): void
    {
        $this->accounting = $accounting;
    }


    /**
     * @return string
     */
    public function getTaxOffice(): string
    {
        return $this->taxOffice;
    }


    /**
     * @param  string  $taxOffice
     */
    public function setTaxOffice(string $taxOffice): void
    {
        $this->taxOffice = $taxOffice;
    }


    /**
     * @return string
     */
    public function getTaxNumber(): string
    {
        return $this->taxNumber;
    }


    /**
     * @param  string  $taxNumber
     */
    public function setTaxNumber(string $taxNumber): void
    {
        $this->taxNumber = $taxNumber;
    }


    /**
     * @return string|null
     */
    public function getLogoBase64(): ?string
    {
        return $this->logoBase64;
    }


    /**
     * @param  string|null  $logoBase64
     */
    public function setLogoBase64(?string $logoBase64): void
    {
        $this->logoBase64 = $logoBase64;
    }


    /**
     * @return string|null
     */
    public function getLogoUrl(): ?string
    {
        return $this->logoUrl;
    }


    /**
     * @param  string|null  $logoUrl
     */
    public function setLogoUrl(?string $logoUrl): void
    {
        $this->logoUrl = $logoUrl;
    }


    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'name' => $this->getName(),
            'ref_id' => $this->getRefId(),
            'logo_base64' => $this->getLogoBase64(),
            'address' => optional($this->getAddress())->toArray(),
            'accounting' => $this->getaccounting(),
            'tax_office' => $this->getTaxOffice(),
            'tax_number' => $this->getTaxNumber(),
            'logo_url' => $this->getLogoUrl()
        ];
    }
}
