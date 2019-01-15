<?php namespace Masterpis\Profile\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Projects Back-end Controller
 */
class Projects extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController'
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    public $requiredPermissions = ['masterpis.profile.manage_projects'];

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Masterpis.Profile', 'profile', 'projects');
    }

    /**
     * extending list
     */
    public function listOverrideColumnValue($record, $columnName)
    {
        if( $columnName == "description" && strlen($record->description) > 20 )
        {
            $description = substr($record->description, 0, 20);

            return "<span title='{$record->description}'>{$description}...</span>";
        }
    }
}
