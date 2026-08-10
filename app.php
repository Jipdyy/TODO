<?php 
    require_once 'actions/list.php';
    require_once 'actions/detail.php';
    require_once 'actions/edit.php';
    require_once 'actions/delete.php';
    require_once 'actions/add.php';

    $notes = [];
    $noteId = 1;
    function mainMenu(): void {
        system('cls');
        echo "\n-- Note App --\n";
        echo "1. Lihat notes\n";
        echo "2. Tambah note\n";
        echo "3. Keluar\n";
    }

    system('cls');
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