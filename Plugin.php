<?php namespace Masterpis\Profile;

use Backend;
use System\Classes\PluginBase;
use Backend\Models\User;


/**
 * profile Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'profile',
            'description' => 'Manage your teams and projects.',
            'author'      => 'masterpis',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {
        User::extend(function($model){
            $model->belongsTo['team'] = ['Masterpis\Profile\Models\Team'];
        });

        \Backend\Controllers\Users::extendListColumns(function ($list) {
            $list->addColumns([
                'team' => [
                    'label' => 'Team',
                    'relation' => 'team',
                    'select' => 'name'
                ]
            ]);
        });
    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return []; // Remove this line to activate

        return [
            'Masterpis\Profile\Components\MyComponent' => 'myComponent',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        // return []; // Remove this line to activate

        // return [
        //     'masterpis.profile.some_permission' => [
        //         'tab' => 'profile',
        //         'label' => 'Some permission'
        //     ],
        // ];

        return [
            'masterpis.profile.manage_teams' => [
                'label' => 'Manage Teams',
                'tab' => 'MasterpisProfileDemo'
            ],
            'mastepris.profile.manage_projects' => [
                'label' => 'Manage Projects',
                'tab' => 'MasterpisProjectDemo'
            ]
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return []; // Remove this line to activate

        return [
            'profile' => [
                'label'       => 'profile',
                'url'         => Backend::url('masterpis/profile/mycontroller'),
                'icon'        => 'icon-leaf',
                'permissions' => ['masterpis.profile.*'],
                'order'       => 500,
            ],
        ];
    }
}
