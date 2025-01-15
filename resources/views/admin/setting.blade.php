@extends('layout.master')
@section('container')
<!-- Main Container -->
      <main id="main-container">
        <!-- Hero -->
        <div class="bg-body-light">
          <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
              <div class="flex-grow-1">
                <h1 class="h3 fw-bold mb-2">
                  Settings
                </h1>
                
              </div>
              <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-alt">
                  <li class="breadcrumb-item">
                    <a class="link-fx" href="javascript:void(0)">Forms</a>
                  </li>
                  <li class="breadcrumb-item" aria-current="page">
                    Layouts
                  </li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
        <!-- END Hero -->
        <!-- Page Content -->
        @livewire('setting')
        <!-- END Page Content -->
      </main>
      @livewireScripts

      <script src="/vendor/livewire-alert/livewire-alert.js"></script> 
<x-livewire-alert::scripts />
      <!-- END Main Container -->
@endsection