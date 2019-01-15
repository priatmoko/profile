<?php namespace Masterpis\Profile\Models;

use Model;

/**
 * Project Model
 */
class Project extends Model
{
    /**
     * @var string The database table used by the model.
     */
    public $table = 'masterpis_profile_projects';

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
    public $hasMany = [];
    //public $belongsTo = [];
    public $belongsTo = [
        'team' => '\Masterpis\Profile\Models\Team'
    ];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];

    protected $dates = ['ends_at'];

    /**
     * get list of team
     */
    public function getTeamIdOptions()
    {
        $teams = \Masterpis\Profile\Models\Team::all(['id', 'name']);
        $teamsOptions = [];

        $teams->each(function($team) use (&$teamsOptions) {
            $teamsOptions[$team->id] = $team->name;
        });

        return $teamsOptions;
    }
}
