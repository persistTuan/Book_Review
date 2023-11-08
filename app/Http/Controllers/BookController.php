<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Session\SessionManager;
class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function review(Request $request, string $id)
    {
        $book = Book::find($id);
        $check_PathImage = Storage::disk("public")->exists($book->coverImageURL);
        $bookInReview = DB::table("reviews")->where("bookID", "=", $id)->select("reviews.*")->first();
        if($bookInReview == null){
            return view("books.show", compact(["book", "check_PathImage"]));
        }
        else{
            $review = Review::find($request->get("selectReviewID"));
            $detailBook = DB::table("books")
                            ->join("reviews", "books.bookID", "=", "reviews.bookID")
                            ->where("books.bookID", "=", $id)
                            ->select("books.*", "reviews.*" )
                            ->get();
                            // print_r($detailBook);
            return view("books.showDetail", compact("check_PathImage", "detailBook", "review" ));
        }
        
    }
    public function index()
    {
        //
        $books = DB::table("books")->paginate(10);
        return view("books.index", compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("books.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = $request->validate([
            "title" => "bail|required",
            "author" => "bail|required|string|not_regex:/[0-9]/",
            "genre" => "bail|required|string|not_regex:/[0-9]/",
            "publicationYear" => "bail|required|date_format:Y",
            "ISBN" => "required|regex:/^ISBN-\d{12}$/",
            "image" => "bail|required|image",
        ]);

        $image = $request->file("image");
        $path = $image->storePublicly("images", "public");

        $book = new Book;
        $book->title = $request->get("title");
        $book->author = $request->get("author");
        $book->genre = $request->get("genre");
        $book->publicationYear = $request->get("publicationYear");
        $book->ISBN = $request->get("ISBN");
        $book->coverImageURL = $path;
        $book->save();
        return redirect()->route("book.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        $detailBook = DB::table("books")
                        ->join("reviews", "books.bookID", "=", "reviews.bookID")
                        ->where("books.bookID", "=", $book->bookID)
                        ->select("books.*", "reviews.*" )
                        ->get();
        $check = Storage::disk("public")->exists($book->coverImageURL);
        return view("books.show", compact(["detailBook", "check"]));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
        $check = Storage::disk("public")->exists($book->coverImageURL);
        return view("books.edit", compact(["book", "check"]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        //
        $validator = $request->validate([
            "title" => "bail|required",
            "author" => "bail|required|string|not_regex:/[0-9]/",
            "genre" => "bail|required",
            "publicationYear" => "bail|required|date_format:Y",
            "ISBN" => "required|not_regex:/^ISBN-\d{12}/",
            "image" => "bail|required|image",
        ]);

        $image = $request->file("image");
        $path = "";
        $content = $image->getContent();
        if(!Storage::disk("public")->exists($book->coverImageURL)){
            $path = $image->storePublicly("images", "public");
            $book->coverImageURL = $path;
        }
        else{
            Storage::disk("public")->put($book->coverImageURL, $content);
        }
        $book->title = $request->get("title");
        $book->author = $request->get("author");
        $book->genre = $request->get("genre");
        $book->publicationYear = $request->get("publicationYear");
        $book->ISBN = $request->get("ISBN");
        $book->updated_at = now();
        $book->save();
        return redirect()->route("book.index");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
        $book->delete();
        return redirect()->route("book.index");
    }
}
