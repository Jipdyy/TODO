<?php
    function deleteNote(array &$notes, int $id): string {
        system('cls');
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