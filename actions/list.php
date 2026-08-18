<?php

trait ListTrait { 
    public function listNotes(): void {
        system('cls');
        if (empty($this->notes)) {
            echo "Belum ada catatan.\n";
            fgets(STDIN); 
            return;
        } 
            
        foreach ($this->notes as $note) {
            echo "\nId: {$note->id}, Title: {$note->title}";
        }

        echo "\nMasukkan ID untuk lihat detail catatan atau '0' untuk kembali: ";
        $choice = trim(fgets(STDIN));

        if ($choice === '0') {
            return;
        }

        $id = (int)$choice;
        foreach ($this->notes as $note) {
            if ($note->id === $id) {
                $this->detailNote($id);
                return;
            }
        } 
        echo "Catatan tidak ditemukan.\n";
    }
}