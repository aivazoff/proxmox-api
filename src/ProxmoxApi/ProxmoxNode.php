<?php

namespace ProxmoxApi;


/**
 * Class ProxmoxNode
 * @package ProxmoxApi
 */
class ProxmoxNode
{
    use ProxmoxTrait;

    /**
     * @var ProxmoxClient
     */
    protected $api;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var stdClass
     */
    private $config;

    /**
     * ProxmoxNode constructor.
     * @param ProxmoxClient $api
     * @param string $name
     */
    public function __construct(ProxmoxClient $api, $name) {
        $this->api = $api;
        $this->name = $name;
    }

    public function vm($vmid) {
        return new ProxmoxVM($this, $vmid);
    }

    /**
     * @return ProxmoxClient
     */
    public function api() {
        return $this->api;
    }

    /**
     * @return string
     */
    public function path() {
        return "/nodes/{$this->name}";
    }

    /**
     * @return stdClass
     * @throws ProxmoxApiException
     */
    public function config() {
        if(is_null($this->config)) {
            $this->config = $this->get('config');
        }
        return $this->config;
    }
}