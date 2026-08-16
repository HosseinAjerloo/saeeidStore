<?php

namespace App\Actions;

use Spatie\Sluggable\Actions\GenerateSlugAction;
use Spatie\Sluggable\SlugOptions;

class GeneratePersianSlugAction extends GenerateSlugAction
{
    public function slugifySource(string $source, SlugOptions $options): string
    {
        $source = trim($source);

        $source = preg_replace(
            '/\s+/u',
            $options->slugSeparator,
            $source
        );

        $source = preg_replace(
            '/[^\p{L}\p{N}\-]/u',
            '',
            $source
        );

        $source = preg_replace(
            '/-+/u',
            '-',
            $source
        );

        return trim($source, '-');
    }
}
