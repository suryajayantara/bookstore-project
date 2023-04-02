@extends('layouts.app')

@section('body')
<div class="flex justify-center">
  
        <div class="flex-col">
            <form action="{{route('books')}}" method="get">
                <div class=" rounded-lg border border-gray-200">
                <table class="min-w-full divide-y-2 divide-gray-200 text-sm">
                    <tr>
                        <td>Count</td>
                        <td><select name="limits">
                            @foreach ($limits as $limit)
                                <option value="{{ $limit }}" @if(request()->get('limit') == $limit) selected @endif>{{ $limit }}</option>
                            @endforeach
                        </select> </td>
                    </tr>
                    <tr>
                        <td>Search</td>
                        <td><input type="text" name="keyword" placeholder="Keyword" class="border"></td>
                    </tr>
                    <tr>
                        <td rowspan="2"><input type="submit" value="submit" class="bg-blue-400 py-2 px-5 text-white rounded"></td>
                    </tr>
                </table>
                <div>

            </form>
        </div>

        <div class=" rounded-lg border border-gray-200 my-10">
            <table class="min-w-full divide-y-2 divide-gray-200 text-sm">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap px-4 py-2 text-left font-medium text-gray-900">
                            No
                        </th>
                        <th class="whitespace-nowrap px-4 py-2 text-left font-medium text-gray-900">
                            Book Name
                        </th>
                        <th class="whitespace-nowrap px-4 py-2 text-left font-medium text-gray-900">
                            Category name
                        </th>
                        <th class="whitespace-nowrap px-4 py-2 text-left font-medium text-gray-900">
                            Author Name
                        </th>
                        <th class="whitespace-nowrap px-4 py-2 text-left font-medium text-gray-900">
                            Avarage Rating
                        </th>
                        <th class="whitespace-nowrap px-4 py-2 text-left font-medium text-gray-900">
                            Voter
                        </th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">
                    
                    @foreach ($books as $book)
                    <tr>
                        <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{$loop->iteration}}</td>
                        <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                            {{$book->title}}
                        </td>
                        <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{$book->category->category_name}}</td>
                        <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{$book->author->name}}</td>
                        <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{$book->avarageRatingSummary()}}</td>
                        <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{$book->votersRatingCount()}}</td>
                    </tr>

                    @endforeach
                    

                    
                </tbody>
            </table>
        </div>


</div>
@endsection
