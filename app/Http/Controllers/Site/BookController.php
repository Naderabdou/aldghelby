<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Repositories\Contract\BookRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    protected $bookRepository;

    public function __construct(BookRepositoryInterface $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    public function index()
    {
        $books = $this->bookRepository->paginate(6, ['column' => 'publish_date', 'dir' => 'DESC']);

        return view('site.books.index', compact('books'));
    }

    public function show($id)
    {
        $books = $this->bookRepository->limit(12, ['column' => 'publish_date', 'dir' => 'DESC']);

        $book = $this->bookRepository->findOne($id);

        return view('site.books.show', compact('book', 'books'));
    }

    public function downloadBook($id)
    {
        $book = $this->bookRepository->findOne($id);

        $download = $book->downloads + 1;

        $book->update(['downloads' => $download]);

        return Storage::download($book->file, $book->title . '.pdf');
    }
}
