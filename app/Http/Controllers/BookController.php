<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Rating;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    //

    public function booksViews(Request $request) : View{
        $books = $this->dataFilters($request);
        $limits = array(10,20,30,40,50,60,70,80,90,10);
        return view('book',compact('books','limits'));

    }

    public function authorsView() : View{
        $authors = $this->countVotersByAuthers();
        return view('authors',compact('authors'));
    }


    public function rating(Request $request) :View {
        $ratingScore = array(1,2,3,4,5,6,7,8,9,10);
        $authorId = $request->author_id;
        $authors = Author::select('id', 'name')->get();
        $books = $authorId ? Book::where('author_id', $authorId)->get() : [];
        return view('rating', compact('authors', 'books','ratingScore'));
    }

    public function storeRating(Request $request){
        $request->validate([
            'book_id' => 'required',
            'rating' => 'required'
        ]);
        try {
            Rating::create($request->all());
        } catch (\Throwable $th) {
            throw $th;
        }
        return to_route('books');
    }


    private function dataFilters($request) :Collection {
        $keyword = $request->keyword;
        $limit = $request->limits ?? 10;

        $data = Book::with('ratings', 'category', 'author')
            ->selectRaw('books.*, AVG(ratings.rating) as avg_rating')
            ->leftJoin('ratings', 'books.id', '=', 'ratings.book_id')
            ->leftJoin('categories', 'books.category_id', '=', 'categories.id');

        $data->when($keyword, function($query) use($keyword){
            return $query->where('title', 'like', '%'.$keyword.'%')
                ->orWhereHas('author', function ($query) use ($keyword) {
                    $query->where('name', 'like', '%'.$keyword.'%');
                });
        });   

        $data = $data->groupBy('books.id')
            ->orderByDesc('avg_rating')
            ->limit($limit)
            ->get();
        
        return $data;
    }

    protected function countVotersByAuthers() : Collection {
        $data = Author::select('authors.*', DB::raw('count(distinct ratings.id) as voter_count'))
        ->leftJoin('books', 'authors.id', '=', 'books.author_id')
        ->leftJoin('ratings', 'books.id', '=', 'ratings.book_id')
        ->where('ratings.rating', '>', 5)
        ->groupBy('authors.id')
        ->having('voter_count', '>', 0)
        ->orderBy('voter_count','DESC')
        ->get();

        return $data;
    }
}
