<?php
/**
 * WhatsAppType
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
 * WhatsAppType Class Doc Comment
 *
 * @category Class
 * @description Type of the message content. Select the type from the dropbox to view their parameters.
 * @package  Infobip
 * @author   Infobip Support
 * @link     https://www.infobip.com
 */
class WhatsAppType
{
    /**
     * Possible values of this enum
     */
    public const TEXT = 'TEXT';
    public const IMAGE = 'IMAGE';
    public const DOCUMENT = 'DOCUMENT';
    public const STICKER = 'STICKER';
    public const LOCATION = 'LOCATION';
    public const CONTACT = 'CONTACT';
    public const VIDEO = 'VIDEO';
    public const VOICE = 'VOICE';
    public const AUDIO = 'AUDIO';
    public const BUTTON = 'BUTTON';
    public const INTERACTIVE_BUTTON_REPLY = 'INTERACTIVE_BUTTON_REPLY';
    public const INTERACTIVE_LIST_REPLY = 'INTERACTIVE_LIST_REPLY';
    public const ORDER = 'ORDER';
    public const UNSUPPORTED = 'UNSUPPORTED';

    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::TEXT,
            self::IMAGE,
            self::DOCUMENT,
            self::STICKER,
            self::LOCATION,
            self::CONTACT,
            self::VIDEO,
            self::VOICE,
            self::AUDIO,
            self::BUTTON,
            self::INTERACTIVE_BUTTON_REPLY,
            self::INTERACTIVE_LIST_REPLY,
            self::ORDER,
            self::UNSUPPORTED,
        ];
    }
}
