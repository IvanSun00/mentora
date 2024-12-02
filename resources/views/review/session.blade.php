@extends('layout.base')

@section('content')
    {{-- {{ $payments[0]->schedules[0]->mentor->student->full_name }} --}}
    <h1 class="font-bold text-3xl m-12 mb-4">Review from past session</h1>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg m-12 mt-0">
        <table class="w-full text-sm text-center rtl:text-right text-gray-500">
            <thead class="text-xs text-white uppercase bg-gradient-to-r from-yellow-500 to-red-500">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Student
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Date
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Expertise
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Engagement
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Clarity
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Motivating
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Punctuality
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Overall
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Comment
                    </th>

                </tr>
            </thead>
            <tbody>
                @php
                    $counter = 0;
                    $expertise = 0;
                    $engagement = 0;
                    $clarity = 0;
                    $motivating = 0;
                    $punctuality = 0;
                    $overall = 0;
                @endphp

                @foreach ($reviews as $review)
                    @php
                        $counter++;
                        $expertise += $review->expertise_score;
                        $engagement += $review->engagement_score;
                        $clarity += $review->clarity_score;
                        $motivating += $review->motivating_score;
                        $punctuality += $review->punctuality_score;
                        $overall += $review->overall_score;
                    @endphp
                    <tr class="odd:bg-white even:bg-gray-50 border-b text-center">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $review->payment->student->full_name }}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $review->payment->schedules[0]->date }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $review->expertise_score }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $review->engagement_score }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $review->clarity_score }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $review->motivating_score }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $review->punctuality_score }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $review->overall_score }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $review->comment }}
                        </td>

                    </tr>
                @endforeach
                <tr class="bg-slate-200 border-b text-center font-bold">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap" colspan="2">
                        Average score
                    </th>
                    <td class="px-6 py-4">
                        {{ round($expertise/$counter, 2) }}
                    </td>
                    <td class="px-6 py-4">
                        {{ round($engagement/$counter, 2) }}
                    </td>
                    <td class="px-6 py-4">
                        {{ round($clarity/$counter, 2) }}
                    </td>
                    <td class="px-6 py-4">
                        {{ round($motivating/$counter, 2) }}
                    </td>
                    <td class="px-6 py-4">
                        {{ round($punctuality/$counter, 2) }}
                    </td>
                    <td class="px-6 py-4">
                        {{ round($overall/$counter, 2) }}
                    </td>
                    <td class="px-6 py-4 bg-gradient-to-br from-blue-500 to-violet-500">
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection

@section('scripts')
    <script>
        document.title = "Session History";
    </script>
@endsection
