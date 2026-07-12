@if ($paginator->hasPages())
<nav role="navigation" aria-label="{{ __('Pagination Navigation') }}">

    {{-- Mobile --}}
    <div class="flex items-center justify-between sm:hidden">

        @if ($paginator->onFirstPage())
            <span class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-md cursor-not-allowed">
                Sebelumnya
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}"
               rel="prev"
               class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-100">
                Sebelumnya
            </a>
        @endif

        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}"
               rel="next"
               class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-100">
                Berikutnya
            </a>
        @else
            <span class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-md cursor-not-allowed">
                Berikutnya
            </span>
        @endif

    </div>

    {{-- Desktop --}}
    <div class="hidden sm:flex w-full justify-end">

        <div class="flex items-center gap-4">

            <p class="text-sm text-gray-700 whitespace-nowrap">

                Menampilkan

                @if ($paginator->firstItem())

                    <span class="font-medium">
                        {{ $paginator->firstItem() }}
                    </span>

                    sampai

                    <span class="font-medium">
                        {{ $paginator->lastItem() }}
                    </span>

                @else

                    {{ $paginator->count() }}

                @endif

                dari

                <span class="font-medium">
                    {{ $paginator->total() }}
                </span>

                buku

            </p>

            <span class="inline-flex rounded-md shadow-sm">

                {{-- Previous Page Link --}}

                {{-- Previous Page Link --}}
@if ($paginator->onFirstPage())

    <span aria-disabled="true">
        <span
            class="inline-flex items-center px-2 py-2 text-gray-400 bg-white border border-gray-300 rounded-l-md cursor-not-allowed">

            <svg class="w-5 h-5"
                fill="currentColor"
                viewBox="0 0 20 20">

                <path
                    fill-rule="evenodd"
                    d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                    clip-rule="evenodd"/>

            </svg>

        </span>
    </span>

@else

    <a href="{{ $paginator->previousPageUrl() }}"
       rel="prev"
       aria-label="Sebelumnya"
       class="inline-flex items-center px-2 py-2 text-gray-600 bg-white border border-gray-300 rounded-l-md hover:bg-gray-100 transition">

        <svg class="w-5 h-5"
            fill="currentColor"
            viewBox="0 0 20 20">

            <path
                fill-rule="evenodd"
                d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                clip-rule="evenodd"/>

        </svg>

    </a>

@endif

{{-- Pagination Elements --}}

{{-- Pagination Elements --}}
@foreach ($elements as $element)

    {{-- Separator (...) --}}
    @if (is_string($element))

        <span aria-disabled="true">
            <span
                class="inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-500 bg-white border border-gray-300">
                {{ $element }}
            </span>
        </span>

    @endif

    {{-- Nomor Halaman --}}
    @if (is_array($element))

        @foreach ($element as $page => $url)

            @if ($page == $paginator->currentPage())

                <span aria-current="page">

                    <span
                        class="inline-flex items-center px-4 py-2 -ml-px text-sm font-semibold text-white bg-[#1D5D8F] border border-[#1D5D8F]">

                        {{ $page }}

                    </span>

                </span>

            @else

                <a href="{{ $url }}"
                   aria-label="Halaman {{ $page }}"
                   class="inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 hover:bg-sky-50 hover:text-[#1D5D8F] transition">

                    {{ $page }}

                </a>

            @endif

        @endforeach

    @endif

@endforeach

{{-- Next Page Link --}}

{{-- Next Page Link --}}
@if ($paginator->hasMorePages())

    <a href="{{ $paginator->nextPageUrl() }}"
       rel="next"
       aria-label="Berikutnya"
       class="inline-flex items-center px-2 py-2 -ml-px text-gray-600 bg-white border border-gray-300 rounded-r-md hover:bg-gray-100 transition">

        <svg class="w-5 h-5"
             fill="currentColor"
             viewBox="0 0 20 20">

            <path fill-rule="evenodd"
                  d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                  clip-rule="evenodd"/>

        </svg>

    </a>

@else

    <span aria-disabled="true">

        <span
            class="inline-flex items-center px-2 py-2 -ml-px text-gray-400 bg-white border border-gray-300 rounded-r-md cursor-not-allowed">

            <svg class="w-5 h-5"
                 fill="currentColor"
                 viewBox="0 0 20 20">

                <path fill-rule="evenodd"
                      d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                      clip-rule="evenodd"/>

            </svg>

        </span>

    </span>

@endif

            </span>

        </div>

    </div>

</nav>
@endif