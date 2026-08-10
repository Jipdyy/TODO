<?php
    function editNote(array &$notes, int $id): string {
        system('cls');
        foreach ($notes as $index => $note) {
            if ($notes[$index]['id'] === $id) {
                echo "\nJudul: {$note['title']}\n";
                echo "Konten: {$note['content']}";

                echo "\nMasukkan judul baru (kosongkan untuk tidak mengubah):";
                $newTitle = trim(fgets(STDIN));

                echo "Masukkan konten baru (kosongkan untuk tidak mengubah):";
                $newContent = trim(fgets(STDIN));

                if ($newTitle !== '') {
                    $notes[$index]['title'] = $newTitle;
                }
                if ($newContent !== '') {
                    $notes[$index]['content'] = $newContent;
                }
                return 'refresh';
            }
        }
        echo "\nCatatan berhasil ditambahkan.\n";
        return 'refresh';
    }