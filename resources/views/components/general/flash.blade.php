@if(session('success'))
    <div style="text-align: center" class = "alert alert-success">
        {{session('success')}}
    </div>
@elseif(session('warning'))
    <div style="text-align: center" class = "alert alert-warning">
        {{session('warning')}}
    </div>
@elseif(session('danger'))
    <div style="text-align: center" class ="alert alert-danger">
            {{session('danger')}}
    </div>
@endif
