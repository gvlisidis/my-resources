<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait HasTags
{

    public function prepareTagsForSync(mixed $userTags): array
    {
        if (blank($userTags)) {
            return [];
        }

        if (is_string($userTags)) {
            return $this->sanitiseTags(explode(',', $userTags));
        }

        return $userTags->toArray();
    }

    private function sanitiseTags(array $tags): array
    {
        foreach ($tags as $key => $tag) {
            if (empty($tag) || Str::of($tag)->trim()->isEmpty()) {
                unset($tags[$key]);
            } else {
                $tags[$key] = trim($tag);
            }
        }

        return $tags;
    }
}
