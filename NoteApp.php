<?php 
require_once 'models/Note.php';
require_once 'actions/list.php';
require_once 'actions/detail.php';
require_once 'actions/edit.php';
require_once 'actions/delete.php';
require_once 'actions/add.php';

class NoteApp {
    use ListTrait, DetailTrait, EditTrait, DeleteTrait, AddTrait;

    private array $notes = [];
    private int $noteId = 1;

    public function mainMenu(): void {
        system('cls');
        echo "\n-- Note App --\n";
        echo "1. Lihat notes\n";
        echo "2. Tambah note\n";
        echo "3. Keluar\n";
    }

    public function run(): void {
        while (true) {
            $this->mainMenu();
            $pilihan = trim(fgets(STDIN));

            switch ($pilihan) {
                case '1':
                    $this->listNotes();
                    break;
                case '2':
                    $status = $this->addNote();
                    if($status === 'add') {
                        $this->listNotes();
                    }
                    break;
                case '3':
                    echo "Sampai jumpa!\n";
                    exit;
                default:
                    echo "Pilihan tidak valid.\n";
            }
        }
    }
}