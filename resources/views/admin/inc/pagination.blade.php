@if(isset($list))
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mt-3 gap-2">
        <div class="text-muted small text-center text-md-left mb-2 mb-md-0">
            @if($list->total() > 0)
                {{ translate('Showing') }} {{ $list->firstItem() }} {{ translate('to') }} {{ $list->lastItem() }} {{ translate('of') }} {{ $list->total() }} {{ translate('entries') }}
            @else
                {{ translate('Showing 0 to 0 of 0 entries') }}
            @endif
        </div>
        <div class="aiz-pagination">
            {{ $list->appends(request()->input())->links() }}
        </div>
    </div>
@endif
