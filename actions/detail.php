<?php
    function detailNote(array &$notes, int $id): void {
        system('cls');
        foreach ($notes as $note) {
            if ($note['id'] === $id) {
                echo "Judul : {$note['title']}\n";
                echo "Konten : {$note['content']}\n";
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
                $status = editNote($notes, $id);
                if ($status === 'refresh') {
                    detailNote($notes, $id);
                }
                return;
            case '2':
                $status = deleteNote($notes, $id);
                if ($status === 'deleted') {
                    listNotes($notes);
                }
                    return;
            case '3':   
                listNotes($notes);
                return;
        }
    }