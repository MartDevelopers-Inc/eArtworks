<?php
/**
 * TfaPinType
 *
 * PHP version 7.2
 *
 * @category Class
 * @package  Infobip
 * @author   Infobip Support
 * @link     https://www.infobip.com
 */

/**
 * Infobip Client API Libraries OpenAPI Specification
 *
 * OpenAPI specification containing public endpoints supported in client API libraries.
 *
 * Contact: support@infobip.com
 *
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * Do not edit the class manually.
 */

namespace Infobip\Model;

use Infobip\ObjectSerializer;

/**
 * TfaPinType Class Doc Comment
 *
 * @category Class
 * @package  Infobip
 * @author   Infobip Support
 * @link     https://www.infobip.com
 */
class TfaPinType
{
    /**
     * Possible values of this enum
     */
    public const NUMERIC = 'NUMERIC';
    public const ALPHA = 'ALPHA';
    public const HEX = 'HEX';
    public const ALPHANUMERIC = 'ALPHANUMERIC';

    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::NUMERIC,
            self::ALPHA,
            self::HEX,
            self::ALPHANUMERIC,
        ];
    }
}
