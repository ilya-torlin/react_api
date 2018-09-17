<?php

use yii\db\Migration;

/**
 * Handles the creation of table `genre_programm`.
 * Has foreign keys to the tables:
 *
 * - `genre`
 * - `programm`
 */
class m180917_203133_create_genre_programm_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('genre_programm', [
            'id' => $this->primaryKey(),
            'genre_id' => $this->integer(),
            'programm_id' => $this->integer(),
        ]);

        // creates index for column `genre_id`
        $this->createIndex(
            'idx-genre_programm-genre_id',
            'genre_programm',
            'genre_id'
        );

        // add foreign key for table `genre`
        $this->addForeignKey(
            'fk-genre_programm-genre_id',
            'genre_programm',
            'genre_id',
            'genre',
            'id',
            'CASCADE'
        );

        // creates index for column `programm_id`
        $this->createIndex(
            'idx-genre_programm-programm_id',
            'genre_programm',
            'programm_id'
        );

        // add foreign key for table `programm`
        $this->addForeignKey(
            'fk-genre_programm-programm_id',
            'genre_programm',
            'programm_id',
            'programm',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `genre`
        $this->dropForeignKey(
            'fk-genre_programm-genre_id',
            'genre_programm'
        );

        // drops index for column `genre_id`
        $this->dropIndex(
            'idx-genre_programm-genre_id',
            'genre_programm'
        );

        // drops foreign key for table `programm`
        $this->dropForeignKey(
            'fk-genre_programm-programm_id',
            'genre_programm'
        );

        // drops index for column `programm_id`
        $this->dropIndex(
            'idx-genre_programm-programm_id',
            'genre_programm'
        );

        $this->dropTable('genre_programm');
    }
}
