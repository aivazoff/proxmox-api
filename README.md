# Proxmox API
Example
```php
require_once __DIR__ . '/proxmox-api.php';

try {

    $api = new ProxmoxApiClient('127.0.0.1:8006', 'root', 'password', 'pam');
    $node = $api->node('proxmox'/* Node name */);
    $vm = $node->vm(100/* VM id */);
    
    print_r($vm->get('status/current'));
    
    /*$vm->put("resize", [
        'disk' => $vm->config()->bootdisk,
        'size' => "+1G"
    ]);*/
    
    // print_r($api->get('nodes'));
    // print_r($node->get('disks/list'));
    // print_r($vm->config());

} catch(ProxmoxApiException $e) {
    exit("Error: {$e->getMessage()}\n");
}
```