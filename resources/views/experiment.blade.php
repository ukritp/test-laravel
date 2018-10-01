@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Variation</div>

                <div class="card-body">
                    @if ($variation === 'control')
                        <div>Control</div>
                    @elseif ($variation === 'varA')
                        <div>Var A</div>
                    @else
                        <div>Default</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
