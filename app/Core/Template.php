<?php

namespace App\Core;



use Modufolio\Toolkit\Tpl;

/**
 * Template
 *
 * @package   Kirby Layouts
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   MIT
 */
class Template
{
    /**
     * @param array $data
     * @return string
     */
    public function render(array $data = []): string
    {
        // load the template
        $template = Tpl::load($this->file(), $data);

        if (Layout::$name === null) {
            return $template;
        }

        // set the default content slot if no slots exist
        if (empty(Slots::$slots) === true) {
            Slots::$slots['content'] = [
                'name'    => 'content',
                'content' => $template
            ];
        }

        return Layout::render($data);
    }
}
