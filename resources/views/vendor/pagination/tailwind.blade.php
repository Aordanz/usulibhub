@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-between gap-4">

        {{-- Mobile Navigation --}}
        <div class="flex gap-2 items-center justify-between w-full sm:hidden">
            @if ($paginator->onFirstPage())
                <span class="inline-flex items-center px-3 py-1.5 text-xs font-semibold text-[#94A3B8] bg-[#F8FAFC] border border-[#E2E8F0] cursor-not-allowed rounded-lg">
                    &laquo; Sebelumnya
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="inline-flex items-center px-3 py-1.5 text-xs font-semibold text-[#334155] bg-white border border-[#E2E8F0] rounded-lg hover:bg-[#F0FDF4] hover:text-[#0B6839] hover:border-[#BBF7D0] transition-colors shadow-2xs">
                    &laquo; Sebelumnya
                </a>
            @endif

            <span class="text-xs text-[#64748B] font-medium">
                Hal. {{ $paginator->currentPage() }} / {{ $paginator->lastPage() }}
            </span>

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="inline-flex items-center px-3 py-1.5 text-xs font-semibold text-[#334155] bg-white border border-[#E2E8F0] rounded-lg hover:bg-[#F0FDF4] hover:text-[#0B6839] hover:border-[#BBF7D0] transition-colors shadow-2xs">
                    Selanjutnya &raquo;
                </a>
            @else
                <span class="inline-flex items-center px-3 py-1.5 text-xs font-semibold text-[#94A3B8] bg-[#F8FAFC] border border-[#E2E8F0] cursor-not-allowed rounded-lg">
                    Selanjutnya &raquo;
                </span>
            @endif
        </div>

        {{-- Desktop Navigation --}}
        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between gap-4">
            <div>
                <p class="text-xs text-[#64748B]">
                    Menampilkan
                    @if ($paginator->firstItem())
                        <strong class="font-bold text-[#0F172A]">{{ $paginator->firstItem() }}</strong>
                        sampai
                        <strong class="font-bold text-[#0F172A]">{{ $paginator->lastItem() }}</strong>
                    @else
                        {{ $paginator->count() }}
                    @endif
                    dari
                    <strong class="font-bold text-[#0F172A]">{{ $paginator->total() }}</strong>
                    data
                </p>
            </div>

            <div>
                <span class="inline-flex items-center gap-1">

                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                            <span class="inline-flex items-center justify-center w-8 h-8 text-xs font-medium text-[#CBD5E1] bg-[#F8FAFC] border border-[#E2E8F0] cursor-not-allowed rounded-lg" aria-hidden="true">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                            </span>
                        </span>
                    @else
                        <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="inline-flex items-center justify-center w-8 h-8 text-xs font-semibold text-[#475569] bg-white border border-[#E2E8F0] rounded-lg hover:bg-[#F0FDF4] hover:text-[#0B6839] hover:border-[#BBF7D0] transition-colors shadow-2xs" aria-label="{{ __('pagination.previous') }}">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <span aria-disabled="true">
                                <span class="inline-flex items-center justify-center w-8 h-8 text-xs font-medium text-[#94A3B8] bg-transparent cursor-default">{{ $element }}</span>
                            </span>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <span aria-current="page">
                                        <span class="inline-flex items-center justify-center w-8 h-8 text-xs font-extrabold text-white bg-[#0B6839] border border-[#0B6839] rounded-lg shadow-xs cursor-default">
                                            {{ $page }}
                                        </span>
                                    </span>
                                @else
                                    <a href="{{ $url }}" class="inline-flex items-center justify-center w-8 h-8 text-xs font-semibold text-[#475569] bg-white border border-[#E2E8F0] rounded-lg hover:bg-[#F0FDF4] hover:text-[#0B6839] hover:border-[#BBF7D0] transition-colors shadow-2xs" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="inline-flex items-center justify-center w-8 h-8 text-xs font-semibold text-[#475569] bg-white border border-[#E2E8F0] rounded-lg hover:bg-[#F0FDF4] hover:text-[#0B6839] hover:border-[#BBF7D0] transition-colors shadow-2xs" aria-label="{{ __('pagination.next') }}">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    @else
                        <span aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                            <span class="inline-flex items-center justify-center w-8 h-8 text-xs font-medium text-[#CBD5E1] bg-[#F8FAFC] border border-[#E2E8F0] cursor-not-allowed rounded-lg" aria-hidden="true">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                </svg>
                            </span>
                        </span>
                    @endif
                </span>
            </div>
        </div>
    </nav>
@endif
