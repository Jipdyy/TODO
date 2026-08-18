<?php
 
trait DeleteTrait {
    public function deleteNote(int $id): string {
        system('clear');
        foreach ($this->notes as $note) {
            if ($note->id === $id) {
                unset($this->notes);
                $this->notes = array_values($this->notes);
                echo "\nCatatan berhasil dihapus.\n";
                return 'deleted';
            }
        }
        echo "\nCatatan tidak ditemukan.\n";
        return 'not_found';
    }
}