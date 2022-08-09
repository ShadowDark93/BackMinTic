@extends('layouts.app')

@section('template_title')
    Update Person
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Person</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('people.update', $person->id) }}"  role="form" enctype="multipart/form-data"> //Colocar PUT en vez de POST
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('person.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
