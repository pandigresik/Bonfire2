<?php

/**
 * This file is part of Bonfire.
 *
 * (c) Lonnie Ezell <lonnieje@gmail.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Bonfire\Modules\Groups;

use Bonfire\Config\BaseModule;
use Bonfire\Libraries\Menus\MenuItem;
use Bonfire\Libraries\Widgets\Stats\StatsItem;

/**
 * User Module setup
 */
class Module extends BaseModule
{
    /**
     * Setup our admin area needs.
     */
    public function initAdmin()
    {
        // Settings menu for sidebar
        $sidebar = service('menus');
        $item    = new MenuItem([
            'title'           => 'User Groups',
            'namedRoute'      => 'user-group-settings',
            'fontAwesomeIcon' => 'fas fa-users',
        ]);
        $sidebar->menu('sidebar')->collection('settings')->addItem($item);

        // Settings widgets stats on dashboard
        $widgets   = service('widgets');
        $groups    = setting('AuthGroups.groups');
        $statsItem = new StatsItem([
            'bgColor' => 'bg-teal',
            'title'   => 'User Groups',
            'value'   => count($groups),
            'url'     => ADMIN_AREA . '/settings/groups',
            'faIcon'  => 'fa fa-users',
        ]);
        $widgets->widget('stats')->collection('stats')->addItem($statsItem);
    }
}
