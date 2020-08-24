@if(session()->has('success'))
    <div class="container-fluid">
        <div class="row">
            <div class="alert alert-success" style="width: 100%;">{{ session()->get('success') }}</div>
        </div>
    </div>
@elseif(session()->has('error'))
    <div class="container-fluid">
        <div class="row">
            <div class="alert alert-danger" style="width: 100%;">{{ session()->get('error') }}</div>
        </div>
    </div>
@endif
