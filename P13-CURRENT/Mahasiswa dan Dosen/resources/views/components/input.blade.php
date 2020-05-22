@php
    $have_label = isset($attrs['label']);
    $have_error = isset($attrs['error']) && $attrs['error'] != '';

    $label_id = str_replace(" ", "_", $attrs['label']);

    // parse type
    $attrs['type'] = $attrs['type'] ?? 'text';

    $attrs_string = "";
    foreach ($attrs as $attr_name => $attr_value){
        $attrs_string .= "$attr_name=\"$attr_value\"";
    }
@endphp

<div>
    @if($have_label)
        <label
            for="{{ $label_id }}"
            class="
                block
                uppercase
                tracking-wide
                text-gray-700
                text-xs
                font-bold
                mb-2
            "
        >
            {{ $attrs['label'] }}
        </label>
    @endif

    @if($attrs['type'] == "select")
        <div class="relative">
            <select
                id="{{ $label_id }}"

                {!! $attrs_string !!}

                class="
                    appearance-none
                    bg-gray-200
                    text-gray-700

                    border
                    {{ $have_error ? 'border-red-500' : ('') }}
                    rounded


                    py-3 px-4 pr-4 pl-8
                    leading-tight

                    focus:outline-none
                    focus:bg-white
                    focus:border-gray-500
                "

                {{ $attrs['class'] ?? '' }}
            >
                @if(isset($attrs['placeholder']))
                    <option value="" hidden>
                        {{ $attrs['placeholder'] }}
                    </option>
                @endif

                @foreach ($options as $key => $value)
                    <option
                        value="{{ $key }}"
                        {{ isset($attrs['value']) && $attrs['value'] == $key ? 'selected' : '' }}
                    >
                        {{ $value }}
                    </option>
                @endforeach
            </select>
            <div
                class="
                    pointer-events-none
                    absolute
                    inset-y-0
                    flex
                    items-center
                    px-2
                    text-gray-700
                "
            >
                <svg
                    class="fill-current h-4 w-4"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20">
                        <path
                            d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"
                        />
                </svg>
            </div>
        </div>
    @else
        <input
            @if($have_label)
                id="{{ $label_id }}"
            @endif

            @if(isset($attrs['placeholder']))
                placeholder="{{ $attrs['placeholder'] }}"
            @endif

            class="
                appearance-none
                block
                bg-gray-200
                text-gray-700

                border
                {{ $have_error ? 'border-red-500' : ('') }}
                rounded

                py-3
                px-4
                leading-tight

                focus:outline-none
                focus:bg-white

                {{ $attrs['class'] ?? '' }}
            "
            {!! $attrs_string !!}
        />
    @endif

    @if($have_error)
        <p class="text-red-500 mt-2 text-xs italic">{{ $attrs['error'] }}</p>
    @endif
</div>
