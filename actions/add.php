<?php
    function addNote(array &$notes, int &$noteId): string {
        system('cls');
        echo "\nMasukkan judul: ";
        $title = trim(fgets(STDIN));

        echo "Masukkan konten: ";
        $content = trim(fgets(STDIN));
        
        array_push($notes, [
            'id' => $noteId,
            'title' => $title,
            'content' => $content
        ]);
        $noteId++;
        return 'add';
    }