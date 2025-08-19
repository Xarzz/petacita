@extends('layouts.admin')

@section('title', 'MBTI Change - Student Career Guidance')
@section('content')
<div class="min-h-screen flex items-center justify-center px-6 lg:pl-60">
    <div class="w-full max-w-2xl bg-secondary rounded-2xl shadow-lg p-8">
        <h2 class="text-2xl font-semibold text-primary mb-6 flex items-center gap-2">
            📝 Update Your MBTI Result
        </h2>

        <form action="{{ route('mbti.update', $mbtiResult->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- MBTI Type -->
            <div class="mb-4">
                <label class="block text-primary font-medium mb-1">
                    MBTI Type <span class="text-red-500">*</span>
                </label>
                <select name="mbti_type" required
                    class="w-full px-4 py-2 rounded-lg border border-primary bg-secondary text-primary focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Select your MBTI type</option>
                    @php
                        $types = [
                            'INTJ' => 'INTJ - The Architect',
                            'INTP' => 'INTP - The Thinker',
                            'ENTJ' => 'ENTJ - The Commander',
                            'ENTP' => 'ENTP - The Debater',
                            'INFJ' => 'INFJ - The Advocate',
                            'INFP' => 'INFP - The Mediator',
                            'ENFJ' => 'ENFJ - The Protagonist',
                            'ENFP' => 'ENFP - The Campaigner',
                            'ISTJ' => 'ISTJ - The Logistician',
                            'ISFJ' => 'ISFJ - The Protector',
                            'ESTJ' => 'ESTJ - The Executive',
                            'ESFJ' => 'ESFJ - The Consul',
                            'ISTP' => 'ISTP - The Virtuoso',
                            'ISFP' => 'ISFP - The Adventurer',
                            'ESTP' => 'ESTP - The Entrepreneur',
                            'ESFP' => 'ESFP - The Entertainer',
                        ];
                    @endphp

                    @foreach($types as $key => $label)
                        <option value="{{ $key }}" {{ $mbtiResult->mbti_type === $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Description -->
            <div class="mb-4">
                <label class="block text-primary font-medium mb-1">Description</label>
                <textarea name="description" rows="3"
                    class="w-full px-4 py-2 rounded-lg border border-primary bg-secondary text-primary focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Write any additional notes...">{{ $mbtiResult->description }}</textarea>
            </div>

            <!-- Date Taken -->
            <div class="mb-6">
                <label class="block text-primary font-medium mb-1">Date Taken</label>
                <input type="date" name="date_taken" value="{{ $mbtiResult->date_taken }}"
                    class="w-full px-4 py-2 rounded-lg border border-primary bg-secondary text-primary focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Submit -->
            <button type="submit"
                class="w-full btn-primary text-white font-semibold py-2 px-4 rounded-lg transition duration-200">
                🔄 Update MBTI
            </button>
        </form>
    </div>
</div>
@endsection
