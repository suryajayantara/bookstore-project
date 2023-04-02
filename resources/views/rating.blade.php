@extends('layouts.app')

@section('body')
<div class="flex justify-center">


   <form action="{{route('ratings.store')}}" method="post">
    @csrf
    <div class=" rounded-lg border border-gray-200 my-10">
        <table class="min-w-full divide-y-2 divide-gray-200 text-sm">
            <tr>
                <th class="whitespace-nowrap px-4 py-2 text-left font-medium text-gray-900">
                    Author Name
                </th>
                <th class="whitespace-nowrap px-4 py-2 text-left font-medium text-gray-900">
                    <select name="author_id" id="author_id" onchange="filter()" class="border">
                        @foreach ($authors as $author)
                        <option value="{{ $author->id }}">{{ $author->name }}</option>
                        @endforeach
                    </select>
                </th>

            </tr>


            <tr>
                <th class="whitespace-nowrap px-4 py-2 text-left font-medium text-gray-900">
                    Book Name
                </th>
                <th class="whitespace-nowrap px-4 py-2 text-left font-medium text-gray-900">
                    <select name="book_id" id="book_id" class="border">
                        @foreach ($books as $book)
                    <option value="{{ $book->id }}">{{ $book->title }}</option>
                @endforeach
                    </select>
                </th>

            </tr>

            <tr>
                <th class="whitespace-nowrap px-4 py-2 text-left font-medium text-gray-900">
                    Rating
                </th>
                <th class="whitespace-nowrap px-4 py-2 text-left font-medium text-gray-900">
                    <select name="rating" id="rating" class="border">
                        @foreach ($ratingScore as $score)
                    <option value="{{ $score }}">{{ $score }}</option>
                @endforeach
                    </select>
                </th>

            </tr>

            <tr>
                <th rowspan="3"> 

                    <input type="submit" class="bg-blue-400 py-2 px-5 text-white rounded"> 
                </th>
            </tr>


        </table>
    </div></form>


</div>


@push('js')
<script>
    const filter = () => {
        const authorId = document.querySelector('#author_id').value;
        window.location.href = '{{ route('ratings') }}' + '?author_id=' + authorId;
    }

</script>
@endpush
@endsection
