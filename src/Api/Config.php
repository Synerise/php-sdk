<?php

namespace Synerise\Sdk\Api;

use Synerise\Sdk\Model\AuthenticationMethodInterface;

interface Config
{
    /**
     * Get API host
     * @return string|null
     */
    public function getApiHost(): ?string;

    /**
     * Get User Agent
     * @return string|null
     */
    public function getUserAgent(): ?string;

    /**
     * Get timeout
     * @return float|null
     */
    public function getTimeout(): ?float;

    /**
     * Check if keep alive is enabled
     * @return bool
     */
    public function isKeepAliveEnabled(): bool;

    /**
     * Get API key
     * @return string|null
     */
    public function getApiKey(): ?string;

    /**
     * Get GUID
     * @return string|null
     */
    public function getGuid(): ?string;

    /**
     * Get authentication method
     * @return AuthenticationMethodInterface|null
     */
    public function getAuthenticationMethod(): ?AuthenticationMethodInterface;
}
