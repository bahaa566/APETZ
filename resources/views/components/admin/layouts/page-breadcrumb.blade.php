@aware(['page_title' => '', 'prev_title'=>'', 'prev_url'=>''])
@props(['prev_url' => ''])

<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-start mb-0">
                    <a href="{{ route('admin.home') }}">
                        {{ __('Home') }}
                    </a>
                </h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        @if ($prev_title != '')
                            <li class="breadcrumb-item">
                                {{-- <a href="{{ $url ?? '' }}"> --}}
                                {{ $prev_title ?? '' }}
                                {{-- </a> --}}
                            </li>
                        @endif

                        <li class="breadcrumb-item">
                            {{ $page_title ?? '' }}
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
