@extends('layouts.admin')

@section('content')
<div class="card border-light bg-light px-3 mb-4">
  <div class="d-flex justify-content-between align-items-center">
    <h2>Offline Order</h2>
    <a href="/admin/sells" class="btn btn-primary">Back</a>
  </div>
</div>

<livewire:sell-entry />

@endsection
