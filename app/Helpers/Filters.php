<?php
namespace App\Helpers;

use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;

class Filters implements FilterInterface
{
    public function applyFilter(Image $image)
    {
        return $image->fit(91, 91);
    }
}
