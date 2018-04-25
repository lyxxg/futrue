<?php

use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Question::class, 50)->create()->each(function($q) {
            $q->save();

            $t = new \App\Models\QuestionTag();
            $t->question_id = $q->id;
            $t->tag_id=1;
            $t->save();

            $t = new \App\Models\QuestionTag();
            $t->question_id = $q->id;
            $t->tag_id=2;
            $t->save();
        });
    }
}
