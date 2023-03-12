<?php

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class MyTwigExtension extends AbstractExtension
{
    public function getFilters()
    {
        return [
            new TwigFilter('contains', [$this, 'containsFilter']),
        ];
    }

    public function containsFilter($haystack, $needle)
    {
        return strpos($haystack, $needle) !== false;
    }
}
