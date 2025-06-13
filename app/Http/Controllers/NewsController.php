<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\News;

class NewsController extends Controller
{
    public function create()
    {
        return view('news.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'encounter_date' => 'nullable|date',
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'image' => 'nullable|image|max:2048',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('news_images', 'public');
        }

        News::create([
            'title' => $request->title,
            'content' => $request->content,
            'encounter_date' => $request->encounter_date,
            'name' => $request->name,
            'email' => $request->email,
            'image' => $imagePath,
            'status' => News::STATUS_UNDER_REVIEW, // Default status for new submissions
        ]);

        return redirect()->back()->with('success', 'News submitted successfully!');
    }
    
    public function index()
    {
        $news = News::latest()->get();
        return view('news.index', compact('news'));
    }
    
    public function edit(News $news)
    {
        return view('news.edit', compact('news'));
    }
    
    public function update(Request $request, News $news)
    {
        $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'encounter_date' => 'nullable|date',
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'status' => 'required|string|in:' . implode(',', array_keys(News::getStatuses())),
            'image' => 'nullable|image|max:2048',
        ]);
        
        $data = [
            'title' => $request->title,
            'content' => $request->content,
            'encounter_date' => $request->encounter_date,
            'name' => $request->name,
            'email' => $request->email,
            'status' => $request->status,
        ];
        
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($news->image) {
                Storage::disk('public')->delete($news->image);
            }
            
            $data['image'] = $request->file('image')->store('news_images', 'public');
        }
        
        $news->update($data);
        
        return redirect()->route('news.index')->with('success', 'News updated successfully!');
    }
    
    public function destroy(News $news)
    {
        // Delete image if exists
        if ($news->image) {
            Storage::disk('public')->delete($news->image);
        }
        
        $news->delete();
        
        return redirect()->route('news.index')->with('success', 'News deleted successfully!');
    }
}
