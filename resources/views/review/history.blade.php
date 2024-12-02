@extends('layout.base')

@section('content')
    {{-- {{ $payments[0]->schedules[0]->mentor->student->full_name }} --}}
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg m-12">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-white uppercase bg-gradient-to-r from-yellow-500 to-red-500">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Date
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Mentor
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Subject
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Review
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($payments as $payment)
                    <tr class="odd:bg-white even:bg-gray-50 border-b">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $payment->schedules[0]->date }}
                        </th>
                        <td class="px-6 py-4">
                            <a href="{{ route('mentor.detailMentor', $payment->schedules[0]->mentor->id) }}"
                                class="italic underline">{{ $payment->schedules[0]->mentor->student->full_name }}</a>
                        </td>
                        <td class="px-6 py-4">
                            {{ $payment->schedules[0]->mentor->subject }}
                        </td>
                        <td class="px-6 py-4 flex justify-center">
                            @if (!$payment->review)
                                <a href="{{ route('review.form', $payment->id) }}"
                                    class="px-5 py-2 bg-yellow-500 rounded-lg shadow-lg text-black font-semibold mx-auto">Review
                                    Mentor</a>
                            @else
                                <p>Reviewed</p>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('scripts')
    <script>
        document.title = "Learning History";
    </script>
@endsection
