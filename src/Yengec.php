<?php

namespace Yengec;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Yengec\Entities\Subscription;
use Yengec\Entities\User;
use Yengec\Entities\Company;

class Yengec implements YengecInterface
{
    const API_BASE_URL_TEST = 'https://api-test.yengec.co';
    const API_BASE_URL_PRODUCTION = 'https://api.yengec.co';

    private bool $isTest;
    private string $clientId;
    private string $clientSecret;
    private ?string $accessToken = null;
    private ?string $companyId;

    private Client $client;

    public function __construct(bool $isTest, string $clientId, string $clientSecret)
    {
        $this->isTest = $isTest;
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;

        $this->client = new Client([
            'base_uri' => $this->isTest ? self::API_BASE_URL_TEST : self::API_BASE_URL_PRODUCTION,
            'headers' => [
                'client-id' => $this->clientId,
                'client-secret' => $this->clientSecret
            ]
       ]);
    }

    /**
     * @return string
     */
    public function getAccessToken(): ?string
    {
        return $this->accessToken;
    }

    /**
     * @param  ?string  $accessToken
     */
    public function setAccessToken(?string $accessToken): void
    {
        $this->accessToken = $accessToken;
    }

    /**
     * @param  string  $method
     * @param  string  $url
     * @param  array  $body
     *
     * @return array
     * @throws Exception
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    protected function request(string $method, string $url, array $body = []): ?array
    {
        try {
            $response = $this->client->request($method, $url, [
                'json' => $body,
                'headers' => $this->accessToken ? [
                    'Authorization' => 'Bearer ' . $this->accessToken
                ]: []
            ]);

            return $this->toArray($response->getBody());
        } catch (ClientException $e) {
            throw new Exception($this->toArray($e->getResponse()->getBody())['message']);
        }
    }

    /**
     * @param  string  $body
     *
     * @return array
     */
    private function toArray(string $body): ?array
    {
        return json_decode($body, true);
    }

    /**
     * @param  string  $channel
     * @param  User  $user
     * @param  Company  $company
     *
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function createAccount(string $channel, User $user, Company $company): array
    {
        return $this->request('POST', 'v1.0/partnership/account', [
            'channel' => $channel,
            'user' => $user->toArray(),
            'company' => $company->toArray()
        ]);
    }

    /**
     * @param  Subscription  $subscription
     *
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function subscribe(Subscription $subscription): array
    {
        return $this->request('POST', 'v1.0/subscription', $subscription->toArray());
    }

    /**
     * @param  string  $subscriptionId
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function cancelSubscription(string $subscriptionId): void
    {
        $this->request('DELETE', 'v1.0/subscription/' . $subscriptionId);
    }

    /**
     * @param string $id Company id
     */
    public function setCompanyId(string $id): void
    {
        $this->setCompanyId($id);
    }
}
