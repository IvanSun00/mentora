@extends('layout.base')

@section('content')
    <h1 class="font-bold text-3xl m-12 mb-4">Booking list</h1>
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
                        Time
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                </tr>
            </thead>
            <tbody>
                @php
                    use Carbon\Carbon;
                    $currentDateTime = Carbon::now();
                @endphp
                @foreach ($schedules as $schedule)
                    @php
                        $scheduleDate1 = Carbon::parse($schedule->date);
                        $scheduleDate2 = Carbon::parse($schedule->date);
                        $startDateTime = $scheduleDate1->setTimeFromTimeString($schedule->hour_start);
                        $endDateTime = $scheduleDate2->setTimeFromTimeString($schedule->hour_end);

                        if ($currentDateTime->lt($startDateTime)) {
                            $status = 'Upcoming';
                        } elseif ($currentDateTime->gte($startDateTime) && $currentDateTime->lte($endDateTime)) {
                            $status = 'Ongoing';
                        } else {
                            $status = 'Done';
                        }
                    @endphp
                    <tr class="odd:bg-white even:bg-gray-50 border-b text-center">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $schedule->payment->student->full_name }}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $schedule->date }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $schedule->hour_start }} - {{ $schedule->hour_end }}
                        </td>
                        <td class="px-6 py-4 flex justify-center">
                            <div class="px-5 py-2 {{$status === 'Done' ? 'bg-green-500' : ($status === 'Ongoing' ? 'bg-yellow-500' : 'bg-blue-500')}} rounded-lg shadow w-fit text-white font-bold">
                                {{ $status }}
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('scripts')
    <script>
        document.title = "Booked Schedule";
    </script>
@endsection
