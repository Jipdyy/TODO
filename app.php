<?php 
    $notes = [];
    $noteId = 1;
    function mainMenu(): void {
        echo "\n-- Note App --\n";
        echo "1. Lihat notes\n";
        echo "2. Tambah note\n";
        echo "3. Keluar\n";
    }

    function listNotes(array &$notes): void {
        if (empty($notes)) {
            echo "Belum ada catatan.\n";
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

    function detailNote(array &$notes, int $id): void {
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

    function addNote(array &$notes, int &$noteId): string {
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

    function editNote(array &$notes, int $id): string {
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

    function deleteNote(array &$notes, int $id): string {
        foreach ($notes as $index => $note) {
            if ($note['id'] === $id) {
                unset($notes[$index]);
                $notes = array_values($notes);
                echo "\nCatatan berhasil dihapus.\n";
                return 'deleted';
            }
        }
        echo "\nCatatan tidak ditemukan.\n";
        return 'not_found';
    }

    while (true) {
        mainMenu();
        $pilihan = trim(fgets(STDIN));

        switch ($pilihan) {
            case '1':
                listNotes($notes);
                break;
            case '2':
                $status = addNote($notes, $noteId);
                if($status === 'add') {
                    listNotes($notes);
                }
                break;
            case '3':
                echo "Sampai jumpa!\n";
                exit;
            default:
                echo "Pilihan tidak valid.\n";
        }
    }

