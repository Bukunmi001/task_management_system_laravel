<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TaskController extends Controller
{
    public function index()
    {
        return Task::all();
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|string',
        ]);
    
        $task = new Task();
        $task->title = $validatedData['title'];
        $task->description = $validatedData['description'];
        $task->status = $validatedData['status'];
        $task->save();
    
        return response()->json(['message' => 'Task created successfully'], 201);
    }

    public function show(Task $task)
    {
        return $task;
    }

    public function update(Request $request, Task $task)
    {
        // Log the incoming request data
        Log::info('Request data:', $request->all());
        
        // Enable query logging
        DB::enableQueryLog();
    
        // Validate the request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:pending,in_progress,completed',
        ]);
    
        // Log the validated data
        Log::info('Validated data:', $validatedData);
    
        // Update the task with validated data
        $task->update($validatedData);
        
        // Log the executed queries
        Log::info(DB::getQueryLog());
    
        return response()->json($task, 200);
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return response()->json(null, 204);
    }
}
