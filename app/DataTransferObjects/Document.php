<?php

namespace App\DataTransferObjects;

class Document
{
    /**
     * Document object.
     *
     * @param string $contents
     * @param string|null $path
     * @param string $key
     * @param string $secret
     * @param string $region
     * @param string $bucket
     * @param string $format
     * @param bool $landscape
     */
    public function __construct(
        public readonly string $contents,
        public readonly ?string $path,
        public readonly string $key,
        public readonly string $secret,
        public readonly string $region,
        public readonly string $bucket,
        public readonly string $format = 'A4',
        public readonly bool $landscape = false,
    ) {
    }
}
