@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Variation</div>

                <div class="card-body">
                    <?php 
                        if ($variation == 'control') {
                            // execute code for control
                            echo 'control';
                        } else if ($variation == 'varA') {
                            // execute code for varA
                            echo 'varA';
                        } else {
                            // execute default code
                            echo 'default';
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
