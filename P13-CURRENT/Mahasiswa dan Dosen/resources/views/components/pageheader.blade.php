<div class='bg-{{ $color ?? 'indigo'}}-700 text-white'>
<div class="container mx-auto py-4 sm:px-4 flex flex-col sm:flex-row">
    <div class='w-100 sm:w-1/2 sm:inline-block'>
        <h1 class='text-2xl sm:p-0 p-2'>
            {{ $title }}
        </h1>
    </div>
    <div class='w-100 sm:w-1/2 text-right'>
        {{ $extends ?? '' }}
    </div>
</div>
</div>
