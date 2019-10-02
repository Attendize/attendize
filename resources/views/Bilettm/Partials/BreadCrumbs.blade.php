@if (count($breadcrumbs))
<section class="page-breadcrumbs">
    <div class="container">
        <div class="row">
            <ul style="padding-left: 15px">
                @foreach ($breadcrumbs as $breadcrumb)
                    @if ($breadcrumb->url && !$loop->last)
                        <li>
                            <a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a>
                        </li>
                        <li>
                            <i class="fa fa-caret-right"></i>
                        </li>
                    @else
                        <li class="page-name">
                            {{ $breadcrumb->title }}
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
</section>
@endif