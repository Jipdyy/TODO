<?php

trait AddTrait {
    public function addNote(): string {
         system('cls');
        echo "\nMasukkan judul: ";
        $title = trim(fgets(STDIN));

        echo "Masukkan konten: ";
        $content = trim(fgets(STDIN));
        
        $note = new Note($this->noteId, $title, $content);
        array_push($this->notes, $note);
        $this->noteId++;
        return 'add';
    }
}