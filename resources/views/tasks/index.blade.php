@extends('tasks.navbar')


@section('section')

   

    <div class="section">
        <div class="section1">
            <h1>Add List</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <form method="POST" action="{{ route('tasks.store') }}">
        @csrf

        <div for="username">Username:</div>
        
        <input type="text" name="username" style="margin:20px;" id="username" required>

        <button type="submit">Save List</button>
    </form>
        </div>

        <div class="table">
            <table id='customers' class="main-table" border='1'>
                <tr>
                    <th>ID</th>
                    <th>User name</th>
                    <th>Hobbies</th>
                    <th>Update</th>
                    <th>Soft delete</th>
                    <th>Hard delete</th>
                    <th>Delete</th>
                </tr>
                @foreach ($tasks as $task)
                <tr>
                    <td>{{ $task->id }}</td>
                    <td>{{ $task->username }}</td>
                    <td>
                        <table class='nested-table'>
                            @foreach ($task->hobbies as $hobby)
                            <tr>
                                <td>{{ $hobby->hobby }}</td>
                            </tr>
                            @endforeach
                        </table>
                    </td>
                    <td colspan='1'>
                        <table class='nested-table'>
                            @foreach ($task->hobbies as $hobby)
                            <tr>
                                <td><a class='op' href="{{ route('tasks.hobbies.edit',$hobby->id) }}">edit</a></td>
                            </tr>
                            @endforeach
                        </table>
                    </td>
                    <td>
                        <table class='nested-table'>
                            @foreach ($task->hobbies as $hobby)
                            <tr>
                            
                                   <td> <a href="{{ route('tasks.hobbies.softDelete',  $hobby->id) }}" class='op'>Soft Delete</a></td>
                            
                            </tr>
                            @endforeach
                        </table>
                    </td>
                    <td>
                        <table class='nested-table'>
                            @foreach ($task->hobbies as $hobby)
                            <tr>
                                <td><a class='op' >hard delete</a></td>
                            </tr>
                            @endforeach
                        </table>
                    </td>
                    <td><a class="op" href="{{ route('tasks.destroy', $task->id) }}">delete</a></td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>

    @endsection
