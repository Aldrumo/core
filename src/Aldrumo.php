<?php

namespace Aldrumo\Core;

class Aldrumo
{
    public function version(): string
    {
        return '0.1.7';
    }

    public function isInstalled(): bool
    {
        return file_exists(base_path('aldrumo.installed'));
    }
}
