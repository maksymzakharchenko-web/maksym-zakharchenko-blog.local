<?php

declare(strict_types=1);

namespace MaksymZ\Framework\Database\Adapter;

interface AdapterInterface
{
    public function getConnection();
}