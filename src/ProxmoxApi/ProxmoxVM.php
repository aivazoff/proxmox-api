<?php

namespace ProxmoxApi;

/**
 * Class ProxmoxVM
 * @package ProxmoxApi
 */
class ProxmoxVM
{
    use ProxmoxMethodsTrait;

    /**
     * @var ProxmoxNode
     */
    protected $node;

    /**
     * @var int
     */
    protected $id;

    /**
     * @var \stdClass
     */
    private $config;

    /**
     * ProxmoxVM constructor.
     * @param ProxmoxNode $node
     * @param int $vmid
     */
    public function __construct(ProxmoxNode $node, $vmid) {
        $this->node = $node;
        $this->id = $vmid;
    }

    function client() {
        return $this->node->client();
    }

    function path() {
        return "{$this->node->path()}/qemu/{$this->id}";
    }

    /**
     * @return \stdClass
     * @throws ProxmoxApiException
     */
    public function config() {
        if(is_null($this->config)) {
            $this->config = $this->get('config');
        }
        return $this->config;
    }
}