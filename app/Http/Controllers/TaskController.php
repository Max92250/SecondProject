<?php

namespace App\Http\Controllers;

use App\Models\Task;

use App\Models\Hobby;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::with(['hobbies' => function ($query) {
            $query->where('active', 1);
        }])->get();
        
        $username = session()->get('username');

        return view('tasks.index', compact('tasks','username'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
        ]);

        Task::create([
            'username' => $request->username,
        ]);

        return redirect()->route('task.index')->with('success', 'Task added successfully!');
    }
    public function destroy($id)
    {
        $task = Task::findOrFail($id);

        $task->hobbies()->delete();

        $task->delete();

        return redirect()->route('task.index')->with('success', 'Task deleted successfully!');
    }
    public function editHobby( $hobbyId)
    {
        $hobby = Hobby::findOrFail($hobbyId);

        return view('tasks.editHobby', compact('hobby'));
    }
    public function updateHobby(Request $request, $hobbyId)
    {
        
        $hobby = Hobby::find($hobbyId);

        $request->validate([
            'hobby_name' => 'required',
          ]);
        
          $hobby->update([
            'hobby' => $request->input('hobby_name'),
       
        ]);

        return redirect()->route('task.index')->with('success', 'Hobby updated successfully!');
    }
    public function softDeleteHobby( $hobbyId)
{
    
    $hobby = Hobby::findOrFail($hobbyId);

    $hobby->update(['active' => 0]);

    return redirect()->route('task.index')->with('success', 'Hobby soft-deleted successfully!');
}
public function hardDeleteHobby($hobbyId)
{
    $hobby = Hobby::findOrFail($hobbyId);

    $hobby->Delete();

    return redirect()->route('task.index')->with('success', 'Hobby permanently deleted!');
}

}
