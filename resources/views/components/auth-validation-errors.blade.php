

<div class="container">
<div class="row">
  <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
      <div class="card-body p-4 p-sm-5">
@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }}>
        <div class="font-medium text-red-600">
            {{ __('Whoops! Something went wrong.') }}
        </div>

        <ul class="mt-3 list-disc list-inside text-sm text-red-600">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</div>
</div>
</div>
</div>


