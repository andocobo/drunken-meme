<?php namespace Andocobo\QuillHomepage\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateFeaturePostsTable extends Migration
{

    public function up()
    {
        Schema::create('andocobo_quillhomepage_feature_posts', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('andocobo_quillhomepage_feature_posts');
    }

}
