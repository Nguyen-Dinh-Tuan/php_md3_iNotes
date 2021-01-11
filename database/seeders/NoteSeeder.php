<?php

namespace Database\Seeders;

use App\Models\Note;
use Illuminate\Database\Seeder;

class NoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $note = new Note();
        $note->id   = 1;
        $note->title = "Sua  quat";
        $note->content  = "Mang quat ra cua hang nguyen dong chi";
        $note->type  = "Ca nhan";
        $note->save();

        $note = new Note();
        $note->id   = 2;
        $note->title = "Mua Tivi";
        $note->content  = "Mang bo sung them  1 TV 48 cho phong hoc";
        $note->type  = "Cong ty";
        $note->save();

        $note = new Note();
        $note->id   = 3;
        $note->title = "Bao cao tuan";
        $note->content  = "Viet bao cao tuan va lap ke hoach cho tuan moi 17/6";
        $note->type  = "Ca nhan";
        $note->save();
    }
}
