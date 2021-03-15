<?php

/*
 * Licensed to Elasticsearch B.V. under one or more contributor
 * license agreements. See the NOTICE file distributed with
 * this work for additional information regarding copyright
 * ownership. Elasticsearch B.V. licenses this file to you under
 * the Apache License, Version 2.0 (the "License"); you may
 * not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing,
 * software distributed under the License is distributed on an
 * "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY
 * KIND, either express or implied.  See the License for the
 * specific language governing permissions and limitations
 * under the License.
 */

declare(strict_types=1);

namespace Elastic\Apm\Impl\Util;

/**
 * Code in this file is part of implementation internals and thus it is not covered by the backward compatibility.
 *
 * @internal
 */
final class UrlUtil
{
    use StaticClassTrait;

    public static function extractHostPart(string $url): ?string
    {
        $result = parse_url($url, PHP_URL_HOST);
        if (!is_string($result)) {
            return null;
        }
        return $result;
    }

    public static function extractPathPart(string $url): ?string
    {
        $result = parse_url($url, PHP_URL_PATH);
        if (!is_string($result)) {
            return null;
        }
        return $result;
    }

    public static function isHttp(string $url): bool
    {
        return TextUtil::isPrefixOf('http://', $url, /* isCaseSensitive */ false)
               || TextUtil::isPrefixOf('https://', $url, /* isCaseSensitive */ false);
    }

    public static function defaultPortForScheme(string $scheme): ?int
    {
        if (strcasecmp($scheme, 'http') === 0) {
            return 80;
        }
        if (strcasecmp($scheme, 'https') === 0) {
            return 443;
        }

        return null;
    }
}
