# Proxmox VE API for PHP

**Install**
```bash
composer require armd-pro/proxmox-api
```

[Proxmox API documentation](https://pve.proxmox.com/pve-docs/api-viewer/index.html)

**Example**
```php
require_once __DIR__ . '/vendor/autoload.php';

try {

    $client = new \ProxmoxApi\ProxmoxClient('127.0.0.1:8006', 'root', 'password', 'pam');
    $node = $client->node('proxmox'/* Node name */);
    $vm = $node->vm(100/* VM id */);
    
    print_r($vm->get('status/current'));
    
    /*$vm->set("resize", [
        'disk' => $vm->config()->bootdisk,
        'size' => "+1G"
    ]);*/
    
    // print_r($client->get('nodes'));
    // print_r($node->get('disks/list'));
    // print_r($vm->config());

} catch(\ProxmoxApi\ProxmoxApiException $e) {
    exit("Error: {$e->getMessage()}\n");
}
```
