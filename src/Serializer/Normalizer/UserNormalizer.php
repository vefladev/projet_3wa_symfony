<?php

namespace App\Serializer\Normalizer;

use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\CacheableSupportsMethodInterface;

class UserNormalizer implements NormalizerInterface,  CacheableSupportsMethodInterface
{
    private $normalizer;

    public function __construct(ObjectNormalizer $normalizer)
    {
        $this->normalizer = $normalizer;
    }
    public function normalize($object, $format = null, array $context = []): array
    {
        $data = $this->normalizer->normalize($object, $format, $context);
        return $data;
    }
    public function supportsNormalization($data, $format = null): bool
    {
        return $data instanceof \App\Entity\User;
    }
    public function hasCacheableSupportsMethod(): bool
    {
        return true;
    }
}
