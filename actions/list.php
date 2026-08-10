<?php
    function listNotes(array &$notes): void {
        system('cls');
        if (empty($notes)) {
            echo "Belum ada catatan.\n";
            fgets(STDIN); 
            return;
        } 
            
        foreach ($notes as $note) {
            echo "\nId: {$note['id']}, Title: {$note['title']}";
        }

        echo "\nMasukkan ID untuk lihat detail catatan atau '0' untuk kembali: ";
        $choice = trim(fgets(STDIN));

        if ($choice === '0') {
            return;
        }

        $id = (int)$choice;
        foreach ($notes as $note) {
            if ($note['id'] === $id) {
                detailNote($notes, $id);
                return;
            }
        }
        echo "Catatan tidak ditemukan.\n";
    }