@extends('admin.layouts.app')
@section('title', 'Roles')
@section('content')
    <div class="card">
        @if (session('message'))
            <h1 class="text-primary">{{ session('message') }}</h1>
        @endif
        <div class="card-body">
            <div class="dropdown float-end">
                <a href="{{ route('roles.create') }}" class="btn btn-success rounded-pill waves-effect waves-light">
                    Add<span class="btn-label-right"><i class="mdi mdi-plus-circle"></i></span>
                </a>
                <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="mdi mdi-dots-vertical"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a href="{{ route('roles.create') }}" class="dropdown-item">Add new</a>
                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                </div>
            </div>

            <h4 class="header-title mt-0 mb-3 font-24">Roles List</h4>

            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Display name</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($roles as $role)
                        <tr>
                            <td>{{ $role ->id }}</td>
                            <td>{{ $role ->name }}</td>
                            <td>{{ $role ->display_name }}</td>
                            <td class="d-flex flex-row">
                                <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-info rounded-pill waves-effect waves-light">
                                    Edit<span class="btn-label-right"><i class="mdi mdi-grease-pencil"></i></span>
                                </a>
                                <form action="{{ route('roles.destroy', $role->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger rounded-pill waves-effect waves-light">
                                        Remove<span class="btn-label-right"><i class="mdi mdi-trash-can-outline"></i></span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $roles->links() }}
            </div>
        </div> 
    </div>
@endsection