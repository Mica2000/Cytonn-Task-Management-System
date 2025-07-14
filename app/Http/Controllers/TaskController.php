<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\TaskCreated;
use App\Jobs\SendEmail;


class TaskController extends Controller
{
    public function index(Request $request)
    {
        return $request->user()->tasks()->latest()->get();
    }

    public function store(Request $request)
    {
        Log::info('Store request received', [
            'user' => $request->user(),
            'data' => $request->all()
        ]);

        $request->validate([
            'title' => 'required',
            'status' => 'in:Pending,In Progress,Completed',
            'deadline' => 'nullable|date',
        ]);

         $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'status' => 'required|string',
        'deadline' => 'required|date',
    ]);

    $task = $request->user()->tasks()->create($validated);

    // // Send email notification to the logged-in user
    // Mail::to($request->user()->email)->send(new TaskCreated($task));
    // Dispatch the job to send email
    SendEmail::dispatch($request->user()->email,$task);
    
    return response()->json(['message' => 'Task created successfully.']);
    }
    

    public function update(Request $request, Task $task)
    {
        $this->authorize('update', $task); // Ensure user owns the task

        $request->validate([
            'title' => 'required',
            'status' => 'in:Pending,In Progress,Completed',
            'deadline' => 'nullable|date',
        ]);

        $task->update($request->all());
        return $task;
    }

    public function destroy(Task $task)
    {
        $this->authorize('delete', $task);
        $task->delete();
        return response()->noContent();
    }
}
