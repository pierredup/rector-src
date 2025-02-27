<?php

declare(strict_types=1);

namespace Rector\Skipper;

final class RealpathMatcher
{
    public function match(string $matchingPath, string $filePath): bool
    {
        $realPathMatchingPath = realpath($matchingPath);
        if (! is_string($realPathMatchingPath)) {
            return false;
        }

        $realpathFilePath = realpath($filePath);
        if (! is_string($realpathFilePath)) {
            return false;
        }

        $normalizedMatchingPath = $this->normalizePath($realPathMatchingPath);
        $normalizedFilePath = $this->normalizePath($realpathFilePath);

        // skip define direct path
        if (is_file($normalizedMatchingPath)) {
            return $normalizedMatchingPath === $normalizedFilePath;
        }

        // ensure add / suffix to ensure no same prefix directory
        if (is_dir($normalizedMatchingPath)) {
            $normalizedMatchingPath = rtrim($normalizedMatchingPath, '/') . '/';
        }

        return str_starts_with($normalizedFilePath, $normalizedMatchingPath);
    }

    private function normalizePath(string $path): string
    {
        return \str_replace('\\', '/', $path);
    }
}
