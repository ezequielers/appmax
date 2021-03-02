<!-- begin:: Subheader -->
<div class="kt-subheader kt-grid__item" id="kt_subheader">
    <div class="kt-container ">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">Dashboard </h3>
            <span class="kt-subheader__separator kt-hidden"></span>
            <div class="kt-subheader__breadcrumbs">
                <a href="{{ route('admin.dashboard') }}" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                @if (! empty($breadcrumbs))
                    @foreach ($breadcrumbs as $label => $link)
                        <span class="kt-subheader__breadcrumbs-separator"></span>
                        @if (is_int($label) && ! is_int($link))
                            <a href="javascript:void(0);" class="kt-subheader__breadcrumbs-link">{{ $link }}</a>
                        @else
                            <a href="{{ $link }}" class="kt-subheader__breadcrumbs-link">{{ $label }}</a>
                        @endif
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
<!-- end:: Subheader -->
