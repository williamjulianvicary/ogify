<?php

declare(strict_types=1);

namespace WilliamJulianVicary\Unfurl\Facades;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Facade;
use WilliamJulianVicary\Unfurl\OgImageBuilder;
use WilliamJulianVicary\Unfurl\OgImageService;

/**
 * @method static OgImageBuilder for(string|Model $subject)
 * @method static string keyForModel(Model $model)
 *
 * @see OgImageService
 */
final class OgImage extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return OgImageService::class;
    }
}
