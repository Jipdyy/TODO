<?php

trait EditTrait {
    public function editNote(int $id): string {
        system('cls');
        foreach ($this->notes as $index => $note) {
            if ($this->notes[$index]->id === $id) {
                echo "\nJudul: {$note->title}\n";
                echo "Konten: {$note->content}";

                echo "\nMasukkan judul baru (kosongkan untuk tidak mengubah):";
                $newTitle = trim(fgets(STDIN));

                echo "Masukkan konten baru (kosongkan untuk tidak mengubah):";
                $newContent = trim(fgets(STDIN));

                if ($newTitle !== '') {
                    $this->notes[$index]->title = $newTitle;
                }
                if ($newContent !== '') {
                    $this->notes[$index]->content = $newContent;
                }
                return 'refresh';
            }
        }
        echo "\nCatatan berhasil ditambahkan.\n";
        return 'refresh';
    }
}
