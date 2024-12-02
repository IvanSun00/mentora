@extends('layout.base')

@section('styles')
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <style>
        h1 {
            font-family: 'Poppins', sans-serif;
        }

        input[type="range"]::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 16px;
            height: 16px;
            background: #7a1010;
            border-radius: 50%;
            border: 2px solid #000;
            cursor: pointer;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.5);
        }


        input[type="range"]::-moz-range-thumb {
            width: 16px;
            height: 16px;
            background: #4caf50;
            border-radius: 50%;
            border: 2px solid #000;
            cursor: pointer;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.5);
        }

        input[type="range"]:focus {
            outline: none;
        }
    </style>
@endsection

@section('content')
    <section class="bg-gradient-to-r from-amber-100 to-red-300 relative overflow-hidden min-h-screen">
        <div class="flex flex-col items-center justify-center py-8 mx-auto">
            <div class="shadow-lg w-1/2 p-8 bg-orange-300 rounded-2xl mt-8">
                <div class="w-full">
                    <div class="p-6 pt-4 space-y-6">
                        <h1 class="text-2xl">Review Mentor <span class="font-bold">{{ $mentor->student->full_name }}</span>
                        </h1>
                        <form class="space-y-4 md:space-y-6" action="{{ route('review.submitForm', $id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{-- expertise --}}
                            <div>
                                <p class="block mb-2 font-medium text-gray-900">
                                    On a scale of 0 to 5, how would you rate the individual’s level of expertise in their
                                    subject area?
                                    <br>
                                    <span class="italic text-sm">
                                        (0 = No expertise, 5 = Exceptional expertise)
                                    </span>
                                </p>
                                <label for="expertise_score" id="expertiseValue"
                                    class="block text-left mb-2 italic">Selected:
                                    0</label>
                                <input type="range" id="expertise_score" name="expertise_score" min="0"
                                    max="5" value="0"
                                    class="w-full appearance-none h-1 bg-black rounded outline-none focus:ring-2 focus:ring-gray-600"
                                    oninput="updateExpertise(this.value)" required>
                            </div>

                            {{-- engagement --}}
                            <div>
                                <p class="block mb-2 font-medium text-gray-900">
                                    On a scale of 0 to 5, how would you rate the individual’s ability to engage and maintain
                                    your attention?
                                    <br>
                                    <span class="italic text-sm">
                                        (0 = Not engaging at all, 5 = Highly engaging)
                                    </span>
                                </p>
                                <label for="engagement_score" id="engagementValue"
                                    class="block text-left mb-2 italic">Selected:
                                    0</label>
                                <input type="range" id="engagement_score" name="engagement_score" min="0"
                                    max="5" value="0"
                                    class="w-full appearance-none h-1 bg-black rounded outline-none focus:ring-2 focus:ring-gray-600"
                                    oninput="updateEngagement(this.value)" required>
                            </div>

                            {{-- Clarity --}}
                            <div>
                                <p class="block mb-2 font-medium text-gray-900">
                                    On a scale of 0 to 5, how would you rate the individual’s ability to communicate ideas
                                    clearly?
                                    <br>
                                    <span class="italic text-sm">
                                        (0 = Very unclear, 5 = Extremely clear)
                                    </span>
                                </p>
                                <label for="clarity_score" id="clarityValue" class="block text-left mb-2 italic">Selected:
                                    0</label>
                                <input type="range" id="clarity_score" name="clarity_score" min="0" max="5"
                                    value="0"
                                    class="w-full appearance-none h-1 bg-black rounded outline-none focus:ring-2 focus:ring-gray-600"
                                    oninput="updateClarity(this.value)" required>
                            </div>

                            {{-- Motivating --}}
                            <div>
                                <p class="block mb-2 font-medium text-gray-900">
                                    On a scale of 0 to 5, how would you rate the individual’s ability to inspire and
                                    motivate you?
                                    <br>
                                    <span class="italic text-sm">
                                        (0 = Not motivating, 5 = Highly motivating)
                                    </span>
                                </p>
                                <label for="motivating_score" id="motivatingValue"
                                    class="block text-left mb-2 italic">Selected:
                                    0</label>
                                <input type="range" id="motivating_score" name="motivating_score" min="0"
                                    max="5" value="0"
                                    class="w-full appearance-none h-1 bg-black rounded outline-none focus:ring-2 focus:ring-gray-600"
                                    oninput="updateMotivating(this.value)" required>
                            </div>

                            {{-- Punctuality --}}
                            <div>
                                <p class="block mb-2 font-medium text-gray-900">
                                    On a scale of 0 to 5, how would you rate the individual’s punctuality and adherence to
                                    schedules?
                                    <br>
                                    <span class="italic text-sm">
                                        (0 = Always late, 5 = Always punctual)
                                    </span>
                                </p>
                                <label for="punctuality_score" id="punctualityValue"
                                    class="block text-left mb-2 italic">Selected:
                                    0</label>
                                <input type="range" id="punctuality_score" name="punctuality_score" min="0"
                                    max="5" value="0"
                                    class="w-full appearance-none h-1 bg-black rounded outline-none focus:ring-2 focus:ring-gray-600"
                                    oninput="updatePunctuality(this.value)" required>
                            </div>

                            {{-- Overall --}}
                            <div>
                                <p class="block mb-2 font-medium text-gray-900">
                                    On a scale of 0 to 5, how would you rate the individual’s overall performance?
                                    <br>
                                    <span class="italic text-sm">
                                        (0 = Very poor, 5 = Outstanding)
                                    </span>
                                </p>
                                <label for="overall_score" id="overallValue"
                                    class="block text-left mb-2 italic">Selected:
                                    0</label>
                                <input type="range" id="overall_score" name="overall_score" min="0"
                                    max="5" value="0"
                                    class="w-full appearance-none h-1 bg-black rounded outline-none focus:ring-2 focus:ring-gray-600"
                                    oninput="updateOverall(this.value)" required>
                            </div>

                            {{-- Comment --}}
                            <div>
                                <label for="comment" class="block mb-2 font-medium text-gray-900">Comment</label>
                                <input type="text" name="comment" id="comment" class="w-full rounded-lg border-gray-300" required>
                            </div>

                            <button type="submit"
                                class="w-full focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-orange-300 p-3 text-center bg-black">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        function updateExpertise(value) {
            document.getElementById('expertiseValue').textContent = `Selected: ${value}`;
        }

        function updateEngagement(value) {
            document.getElementById('engagementValue').textContent = `Selected: ${value}`;
        }

        function updateClarity(value) {
            document.getElementById('clarityValue').textContent = `Selected: ${value}`;
        }

        function updateMotivating(value) {
            document.getElementById('motivatingValue').textContent = `Selected: ${value}`;
        }

        function updatePunctuality(value) {
            document.getElementById('punctualityValue').textContent = `Selected: ${value}`;
        }

        function updateOverall(value) {
            document.getElementById('overallValue').textContent = `Selected: ${value}`;
        }
    </script>
@endsection
