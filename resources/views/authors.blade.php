@extends('layouts.app')

@section('body')
<div class="flex justify-center">
  

        <div class=" rounded-lg border border-gray-200 my-10">
            <table class="min-w-full divide-y-2 divide-gray-200 text-sm">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap px-4 py-2 text-left font-medium text-gray-900">
                            No
                        </th>
                        <th class="whitespace-nowrap px-4 py-2 text-left font-medium text-gray-900">
                            Author Name
                        </th>
                        <th class="whitespace-nowrap px-4 py-2 text-left font-medium text-gray-900">
                            Voters
                        </th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">
                    
                    @foreach ($authors as $author)
                    <tr>
                        <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{$loop->iteration}}</td>
                        <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                            {{$author->name}}
                        </td>
                        <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{$author->voter_count}}</td>
                        
                    </tr>

                    @endforeach
                    

                    
                </tbody>
            </table>
        </div>


</div>
@endsection
