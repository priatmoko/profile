<?php namespace Masterpis\Profile\Updates;
 
use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class AddTeamToUsers extends Migration
{
    public function up()
    {
        if(!Schema::hasColumn('backend_users', 'team_id'))
        {
            Schema::table('backend_users', function(Blueprint $table)
            {
                $table->integer('team_id')->unsigned()->index()->nullable();
            });
        }
    }

    public function down()
    {
        if(Schema::hasColumn('backend_users', 'team_id'))
        {
            Schema::table('backend_users', function(Blueprint $table)
            {
                $table->dropColumn('team_id');
            });
        }
    }
}
?>