<?php

trait DetailTrait {
    public function detailNote(int $id): void {
     system('clear');
        foreach ($this->notes as $note) {
            if ($note->id === $id) {
                echo "Judul : {$note->title}\n";
                echo "Konten : {$note->content}\n";
                echo "\n1. Ubah note\n";
                echo "2. Hapus note\n";
                echo "3. Kembali ke list\n";
                break;
            }
        }
 
        echo "\nPilih menu: ";
        $choice = trim(fgets(STDIN));

        switch ($choice) {
            case '1':
                $status = $this->editNote($id);
                if ($status === 'refresh') {
                    $this->detailNote($id);
                }
                return;
            case '2':
                $status = $this->deleteNote($id);
                if ($status === 'deleted') {
                    $this->listNotes();
                }
                    return;
            case '3':   
                $this->listNotes();
                return;
        }
    }
}