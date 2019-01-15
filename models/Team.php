<?php namespace Masterpis\Profile\Models;

use Model;

/**
 * Team Model
 */
class Team extends Model
{
    use \October\Rain\Database\Traits\Validation;
    /**
     * @var string The database table used by the model.
     */
    public $table = 'masterpis_profile_teams';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    //public $hasMany = [];
    public $hasMany = [
        'projects'  => '\Masterpis\Profile\Models\Projects',
        'users'      => '\Backend\Models\User'
    ];
    public $belongsTo = [];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];

    /**
     * Team rule form
     */
    public $rules = [
        'name' => 'required'
    ];

    /**
     * fill the users checkbox list
     */
    public function getUsersOptions()
    {
        return \Backend\Models\User::lists('login', 'id');
    }
}
