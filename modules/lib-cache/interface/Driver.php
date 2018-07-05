<?php
/**
 * Cache driver interface
 * @package lib-cache
 * @version 0.0.1
 */

namespace LibCache\Iface;

interface Driver
{
    public function add(string $name, $value, int $expires): void;
    public function exists(string $name): bool;
    public function list(): array;
    public function remove(string $name): void;
    public function truncate(): void;
}