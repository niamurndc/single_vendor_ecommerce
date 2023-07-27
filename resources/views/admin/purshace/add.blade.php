@extends('layouts.admin')

@section('content')
<div class="card border-light bg-light px-3 mb-4">
  <div class="d-flex justify-content-between align-items-center">
    <h2>Purshace</h2>
    <a href="/admin/purshaces" class="btn btn-primary">Back</a>
  </div>
</div>

<livewire:purshace-entry />

@endsection
