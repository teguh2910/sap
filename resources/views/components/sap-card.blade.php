<div class="rounded-lg border-2 p-6 shadow-sm transition-all duration-200 hover:shadow-md {{ $cardClasses() }}">
    @if($loading)
        <div class="animate-pulse">
            <div class="flex items-center space-x-4">
                <div class="h-12 w-12 rounded-full bg-gray-300"></div>
                <div class="flex-1 space-y-2">
                    <div class="h-4 w-3/4 rounded bg-gray-300"></div>
                    <div class="h-3 w-1/2 rounded bg-gray-300"></div>
                </div>
            </div>
        </div>
    @else
        <div class="flex items-start space-x-4">
            @if($icon)
                <div class="flex-shrink-0">
                    <i class="{{ $icon }} {{ $iconClasses() }} text-2xl"></i>
                </div>
            @endif

            <div class="flex-1 min-w-0">
                @if($title)
                    <h3 class="text-lg font-semibold text-gray-900 truncate">
                        {{ $title }}
                    </h3>
                @endif

                @if($subtitle)
                    <p class="text-sm text-gray-600 mt-1">
                        {{ $subtitle }}
                    </p>
                @endif

                @if($slot->isNotEmpty())
                    <div class="mt-4">
                        {{ $slot }}
                    </div>
                @endif
            </div>
        </div>
    @endif
</div>