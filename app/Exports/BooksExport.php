<?php

namespace App\Exports;

use App\Models\Book;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BooksExport implements FromArray, WithHeadingRow, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function array(): array
    {
        return Book::getDataBooks();
        
    }

    public function headings(){
        return [
            'No',
            'Judul',
            'Penulis',
            'Tahun Penerbit',
            'Tahun',
            'Penerbit',
        ];
    }
}