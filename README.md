# lib-cache

Adalah module penyedia cache bagi aplikasi. Module ini menyediakan
satu service dengan nama `cache` yang bisa diakses dari kontroler.

## instalasi

Jalankan perintah di bawah di folder aplikasi:

```
mim app install lib-cache
```

Intalasi module ini akan menyediakan cache dengan driver file. Untuk
dukungan cache driver redis, atau yang lainnya, silahkan instal module
yang bersangkutan.

## konfigurasi

Untuk cache dengan method file, semua cache akan disimpan di folder 
`BASEPATH/etc/cache/lib-cache`. Untuk memindahkan lokasi penyimpanan,
tambahkan konfigurasi seperti di bawah pada aplikasi:

```php
return [
    'libCache' => [
        'file' => [
            'base' => '/path/to/dir'
        ]
    ]
];
```

Nilai `base` menerima absolute atau relative path.

## penggunaan

Dari kontroler, atau middleware, atau service, service cache bisa digunakan
seperti contoh di bawah:

```php
// di dalam method sebuah kontroler
$name = 'cache-name';
$value= 'cache-value';

$this->cache->add($name, $value, 82800);
$data = $this->cache->get($name);
```

## method

### add(string $name, mixed $value, int $expires): void
### exists(string $name): bool
### get(string $name): ?mixed
### list(): array
### remove(string $name): void
### truncate(): void

## custom driver

Jika ingin menggunakan custom driver, maka pastikan menambahkan konfigurasi seperti 
di bawah pada konfigurasi module:

```php
    ...,
    'libCache' => [
        'handlers' => [
            'driver-name' => 'HandlerClass'
        ]
    ]
    ...,
```

Kemudian, pada konfigurasi aplikasi, tambahakn konfigurasi seperti di bawah:

```php
    ...,
    'libCache' => [
        'driver' => 'driver-name'
    ]
    ...,
```

Untuk handler cache, pastikan implement interface `LibCache\Iface\Driver`.