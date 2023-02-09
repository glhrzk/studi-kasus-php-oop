<?php

/**
 * Repository : bisnis rule yang berhubungan dengan logic ke database
 * Repository juga mengelola data entity.
 */

namespace Repository {

    use Entity\Todolist;


    /**
     * mengapa menggunakan interface terlebih dahulu?
     * agar dapat gambaran logic, berguna ketika nanti di php unit test
     */
    interface TodolistRepository
    {
        function save(Todolist $todolist): void;
        /**
         * menggunakan variable tipe data todolist di parameter, sama saja/seolah olah
         * : jika ingin mengesave data todolis maka membutuhkan parameter $todo yang ada pada Todolist dan ada juga fungsi setNya.
         */
        function remove(int $number): bool;

        function findAll(): array;
    }

    class TodolistRepositoryImpl implements TodolistRepository
    {
        /**
         * ini properties array untuk menyimpan semua data-data todolist, bisa dibilang database
         */
        public array $todolist = array();

        function save(Todolist $todolist): void
        {
            $number = sizeof($this->todolist) + 1;
            $this->todolist[$number] = $todolist;
        }

        function remove(int $number): bool
        {
            // cek apakah number yang dihapus melebihi dari total data.
            if ($number > sizeof($this->todolist)) {
                return false;
            }

            // perulangan untuk menggeser ke posisi akhir
            for ($i = $number; $i < sizeof($this->todolist); $i++) {
                $this->todolist[$i] = $this->todolist[$i + 1];
            }

            unset($this->todolist[sizeof($this->todolist)]);
            return true;
        }

        function findAll(): array
        {
            return $this->todolist;
        }
    }
}
