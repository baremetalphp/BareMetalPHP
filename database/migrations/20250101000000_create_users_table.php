<?php

use BareMetalPHP\Database\Migration;
use BareMetalPHP\Database\Connection;

return new class extends Migration
{
    public function up(Connection $connection): void
    {
        $this->createTable($connection, 'users', function ($table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamps();
        });
    }

    public function down(Connection $connection): void
    {
        $this->dropTable($connection, 'users');
    }
};

