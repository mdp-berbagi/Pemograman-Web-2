@php
    $have_method = isset($method);

    $color = $color ?? 'indigo';
    $tag = isset($href) ? 'a' : 'button'
@endphp
<div
    class="
        p-2
        bg-{{ $color }}-600
        items-center
        text-{{ $color }}-100
        leading-none
        sm:rounded-full
        flex
        sm:inline-flex
    "
>
    <!-- link -->
    <{{ $tag }}
        href='{{ $href ?? '' }}'

        class="
            font-semibold
            ml-1
            mr-2
            text-left
            flex-auto
            hover:shadow-2xl
        "
        @if($have_method)
            onclick="this.getElementsByTagName('form')[0].submit(); return false;"
        @endif
    >
        @if($have_method)
            <form target="{{ $href ?? '' }}" method="POST" formtarget="_self">
                @csrf
                @method($method)
            </form>
        @endif
        {{ $name }}
    </{{ $tag }}>

    <!-- icon -->
    <svg
        class="fill-current opacity-75 h-4 w-4"
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 20 20">
            <path
                d="M12.95 10.707l.707-.707L8 4.343 6.586 5.757 10.828 10l-4.242 4.243L8 15.657l4.95-4.95z"
            />
    </svg>
</div>
