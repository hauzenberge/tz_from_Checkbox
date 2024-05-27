<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\StoreBookRequest;
use App\Http\Resources\BookResource;
use Illuminate\Support\Facades\Storage;

use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        return BookResource::collection(Book::paginate());
    }

    public function store(StoreBookRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        $book = Book::create($data);
        $book->authors()->sync($data['authors']);
        
        return new BookResource($book);
    }

    public function show(Book $book)
    {
        return new BookResource($book);
    }

    public function update(StoreBookRequest $request, Book $book)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($book->image);
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        $book->update($data);
        $book->authors()->sync($data['authors']);

        return new BookResource($book);
    }

    public function destroy(Book $book)
    {
        if ($book->image) {
            Storage::disk('public')->delete($book->image);
        }

        $book->delete();
        return response()->noContent();
    }

    public function searchByAuthor($author)
    {
        $books = Book::whereHas('authors', function($query) use ($author) {
            $query->where('last_name', 'like', '%' . $author . '%');
        })->paginate();

        return BookResource::collection($books);
    }
}
