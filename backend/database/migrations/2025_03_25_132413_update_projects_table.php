<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Agregar SoftDeletes
        Schema::table('project', function (Blueprint $table) {
            $table->softDeletes();
        });

        // Renombrar la tabla a "projects" (opcional)
        Schema::rename('project', 'projects');
    }

    public function down()
    {
        // Quitar SoftDeletes
        Schema::table('projects', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        // Renombrar la tabla de vuelta a "project" (si se renombró)
        Schema::rename('projects', 'project');
    }
};
