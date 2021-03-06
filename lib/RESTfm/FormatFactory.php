<?php
/**
 * RESTfm - FileMaker RESTful Web Service
 *
 * @copyright
 *  Copyright (c) 2011-2017 Goya Pty Ltd.
 *
 * @license
 *  Licensed under The MIT License. For full copyright and license information,
 *  please see the LICENSE file distributed with this package.
 *  Redistributions of files must retain the above copyright notice.
 *
 * @link
 *  http://restfm.com
 *
 * @author
 *  Gavin Stewart
 */

namespace RESTfm;

/**
 * Format/Format* object factory static class.
 */
class FormatFactory {

    /**
     * Return a Format object of the requested type.
     *
     * @param string $type
     *  Type of formatter object to return.
     *
     * @throws ResponseException
     *  When no matching formatter found.
     *
     * @return FormatAbstract
     *  Returns a new object of $type that implements FormatAbstract.
     */
    public static function makeFormatter ($type = 'html') {
        // Map virtual formats.
        if (isset(self::$_map[$type])) {
            $type = self::$_map[$type];
        }

        $formatClassName = 'RESTfm\\Format\\Format'.ucfirst(strtolower($type));
        return new $formatClassName();
    }

    /**
     * @var Array $_map
     *  Map some known virtual formats.
     */
    protected static $_map = array(
        'application/x-www-form-urlencoded' => 'html',
    );

}
