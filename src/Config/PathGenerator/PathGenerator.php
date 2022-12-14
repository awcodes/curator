<?php

namespace Awcodes\Curator\Config\PathGenerator;

interface PathGenerator
{
    public function getPath(?string $baseDir = null): string;
}
