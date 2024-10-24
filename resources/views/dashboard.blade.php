<x-app-layout>
    <div class="pagetitle">
        <h1>Blank Page</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">Pages</li>
            <li class="breadcrumb-item active">Blank</li>
          </ol>
        </nav>
      </div><!-- End Page Title -->

      <section class="section">
        <div class="row">
          <div class="col-lg-6">
  
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Example Card</h5>
                <p>This is an examle page with no contrnt. You can use it as a starter for your custom pages.</p>
              </div>
            </div>
  
          </div>
  
          <div class="col-lg-6">
  
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Example Card</h5>
                <p>This is an examle page with no contrnt. You can use it as a starter for your custom pages.</p>
              </div>
            </div>
  
          </div>
        </div>
      </section>
      
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
