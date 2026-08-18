<?php

trait EditTrait {
    public function editNote(int $id): string {
        system('clear');
        foreach ($this->notes as $note) {
            if ($note->id === $id) {
                echo "\nJudul: {$note->title}\n";
                echo "Konten: {$note->content}";

                echo "\nMasukkan judul baru (kosongkan untuk tidak mengubah):";
                $newTitle = trim(fgets(STDIN));

                echo "Masukkan konten baru (kosongkan untuk tidak mengubah):";
                $newContent = trim(fgets(STDIN));

                if ($newTitle !== '') {
                    $note->title = $newTitle;
                }
                if ($newContent !== '') {
                    $note->content = $newContent;
                }
                return 'refresh';
            }
        }
        echo "\nCatatan berhasil ditambahkan.\n";
        return 'refresh';
    }
}
