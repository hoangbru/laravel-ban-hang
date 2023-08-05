@extends('admin.layouts.app')
@section('title', 'Roles | Edit'.$role->name)
@section('content')
<div class="card">
    <div class="card-body">
        <a href="{{ route('roles.index') }}" class="text-muted font-14 mb-3">
            <i class="mdi mdi-arrow-left"></i> Back to list
        </a>
        <h4 class="header-title mb-3 font-24">Edit role</h4>

        <form action="{{ route('roles.update', $role->id) }}" method="post" role="form" class="parsley-examples" >
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <label for="inputEmail3" class="col-4 col-form-label">Name<span class="text-danger">*</span></label>
                <div class="col-7">
                    <input name="name" value="{{ old('name') ?? $role->name }}" type="text" parsley-type="name" class="form-control" id="inputEmail3" placeholder="Name" />
                    @error('name')
                        <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="hori-pass1" class="col-4 col-form-label">Display name<span class="text-danger">*</span></label>
                <div class="col-7">
                    <input name="display_name" value="{{ old('display_name') ?? $role->display_name }}" id="hori-pass1" type="text" placeholder="Display name" class="form-control" />
                    @error('display_name')
                        <span class="text-danger"> {{ $message }}</span>
                    @enderror

                </div>
            </div>

            <div class="row mb-3">
                <label for="example-select" class="col-4 col-form-label">Group</label>
                <div class="col-7">
                    <select class="form-select" name="group" id="example-select" value={{ $role->group }}>
                        <option value="system">System</option>
                        <option value="user">User</option>
                    </select>
                    @error('group')
                        <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="hori-pass1" class="col-4 col-form-label">Permission</label>
                <div class="col-7 d-flex flex-column">
                    <div class="row">
                        @foreach($permissions as $groupName => $permission)
                        <div class="col-6">
                            <h3>{{ $groupName }}</h3>
                            <div>
                                @foreach($permission as $item)
                                <div class="form-check mb-2 form-check-success">
                                    <input 
                                        class="form-check-input rounded-circle" 
                                        type="checkbox" 
                                        value="{{ $item->id }}" 
                                        name="permission_ids[]" 
                                        id="{{ $item->id }}"
                                        {{ $role->permissions->contains('name', $item->name) ? 'checked' : '' }}
                                    >
                                    <label class="form-check-label" for="{{ $item->id }}">{{ $item->display_name }}</label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                
            </div>
            <div class="row mb-3">
                <div class="col-8 offset-4">
                    <button type="submit" class="btn btn-success rounded-pill waves-effect waves-light">
                        Save<span class="btn-label-right"><i class="mdi mdi-shield-check"></i></span>
                    </button>
                    <button type="reset" class="btn btn-secondary rounded-pill waves-effect">
                        Reset<span class="btn-label-right"><i class="mdi mdi-sync"></i></span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection