<?php
 
trait DeleteTrait {
    public function deleteNote(int $id): string {
        system('cls');
        foreach ($this->notes as $index => $note) {
            if ($this->notes[$index]->id === $id) {
                unset($this->notes[$index]);
                $this->notes = array_values($this->notes);
                echo "\nCatatan berhasil dihapus.\n";
                return 'deleted';
            }
        }
        echo "\nCatatan tidak ditemukan.\n";
        return 'not_found';
    }
}