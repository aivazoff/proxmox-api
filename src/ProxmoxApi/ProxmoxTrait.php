<?php

namespace ProxmoxApi;


/**
 * Trait ProxmoxApiTrait
 * @package ProxmoxApi
 */
trait ProxmoxTrait
{
    /**
     * @return ProxmoxClient
     */
    abstract function api();

    /**
     * @return string
     */
    abstract function path();

    /**
     * @param string $action
     * @param array $params
     * @return mixed
     * @throws ProxmoxApiException
     */
    public function get($action, array $params = []) {
        return $this->api()->request(ProxmoxClient::REQUEST_MENTHOD_GET, $this->pathNormalize($action), $params);
    }

    /**
     * @param string $action
     * @param array $params
     * @return mixed
     * @throws ProxmoxApiException
     */
    public function post($action, array $params = []) {
        return $this->api()->request(ProxmoxClient::REQUEST_MENTHOD_POST, $this->pathNormalize($action), $params);
    }

    /**
     * @param string $action
     * @param array $params
     * @return mixed
     * @throws ProxmoxApiException
     */
    public function put($action, array $params = []) {
        return $this->api()->request(ProxmoxClient::REQUEST_MENTHOD_PUT, $this->pathNormalize($action), $params);
    }

    /**
     * @param string $action
     * @return mixed
     * @throws ProxmoxApiException
     */
    public function delete($action) {
        return $this->api()->request(ProxmoxClient::REQUEST_MENTHOD_DELETE, $this->pathNormalize($action));
    }

    private function pathNormalize($action) {
        return rtrim($this->path(), '/') . '/' . ltrim($action, '/');
    }
}