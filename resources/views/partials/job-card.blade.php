<div class="card-shadow rounded-lg p-6 hover-scale">
    <div class="flex items-center justify-between mb-4">
        <div class="flex gap-4">
            <div class="text-2xl text-indigo-500">
                <i class="fas fa-building"></i>
            </div>
            <div>
                <h3 class="text-lg font-semibold text-primary">{{ $job->job_title }}</h3>
                <p class="text-sm text-secondary">{{ $job->company_name }}</p>
            </div>
        </div>
        @if(isset($job->match_percentage))
            <span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs font-medium">
                {{ $job->match_percentage }}% Match
            </span>
        @endif
    </div>
    <div class="flex flex-wrap text-sm text-secondary gap-3 mb-3">
        <span><i class="fas fa-map-marker-alt mr-1"></i> {{ $job->location }}</span>
        <span><i class="fas fa-clock mr-1"></i> {{ $job->job_type }}</span>
        <span><i class="fas fa-dollar-sign mr-1"></i> {{ $job->salary }}</span>
    </div>
    <p class="text-sm text-primary mb-3">
        {{ $job->description ?? $job->recommendation }}
    </p>
    <div class="flex flex-wrap gap-2 mb-4">
        @foreach (json_decode($job->skills) ?? [] as $skill)
            <span class="bg-indigo-100 text-indigo-800 px-2 py-1 rounded text-xs font-medium">{{ $skill }}</span>
        @endforeach
    </div>
    <div class="flex gap-2">
        <button class="bg-indigo-600 hover:bg-indigo-700 text-white text-sm px-4 py-2 rounded">Set Goals</button>
        <form action="{{ route('saved.store') }}" method="POST">
            @csrf
            <input type="hidden" name="item_id" value="{{ $job->id }}">
            <input type="hidden" name="item_type" value="employment">
            <button type="submit" class="border border-indigo-600 text-indigo-600 hover:bg-indigo-50 text-sm px-4 py-2 rounded">Save Job</button>
        </form>
    </div>
</div>
