@extends('app.layouts.app')

@section('content')
    <section class="section">
        <div class="row" id="table-head">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Data Users</h4>
                    </div>
                    <div class="card-content">
                        <!-- table head dark -->
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>NAME</th>
                                        <th>Email</th>
                                        <th>Password</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $user)
                                        <tr>
                                            <td class="text-bold-500">{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td class="text-bold-500">{{ $user->password }}</td>
                                            <td>
                                                <a href="{{ route('users-edit-app', $user->id) }}">
                                                    Edit
                                                </a>
                                                <span>
                                                    <form action="{{ route('users-delete-app', $user->id) }}" method="POST"
                                                        accept-charset="utf-8" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn text-danger">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
