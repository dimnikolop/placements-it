<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of all the announcements.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $announcements = Announcement::orderBy('updated_at', 'desc')->get();

        if (auth()->check() && auth()->user()->role === 'admin') {
            return view('announcements.index', [
                'announcements' => $announcements
            ]);
        }
        else {
            return view('main.announcements', [
                'announcements' => $announcements
            ]);
        }
    }

    /**
     * Show the form for creating a new announcement.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('announcements.create');
    }

    /**
     * Store a newly created announcement in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request...
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'attachment' => 'file'
        ]);

        $announcement = new Announcement;

        $announcement->title = $request->title;
        $announcement->content = $request->content;

        // Handle file upload
        if($request->hasFile('attachment') && $request->file('attachment')->isValid()) {
            $fileName = time() . '_' . $request->file('attachment')->getClientOriginalName();
            $filePath = $request->file('attachment')->storeAs('uploads', $fileName, 'public');
            $announcement->attachment = $filePath;
            $request->session()->flash('success', 'Η ανακοίνωση και το αρχείο με όνομα ('.$request->file('attachment')->getClientOriginalName().') καταχωρήθηκαν επιτυχώς');
        }
        else {
            $request->session()->flash('success', 'Η ανακοίνωση καταχωρήθηκε επιτυχώς');
        }
        
        $announcement->save();

        return redirect()->route('announcements.index');
    }

    /**
     * Display the specified announcement.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $announcement = Announcement::find($id);

        return view('announcements.show', compact('announcement'));
    }

    /**
     * Show the form for editing the specified announcement.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $announcement = Announcement::find($id);

        return view('announcements.edit', compact('announcement'));
    }

    /**
     * Update the specified announcement in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $announcement = Announcement::find($id);

        $announcement->title = $request->title;
        $announcement->content = $request->content;

        // Handle file upload
        if ($request->hasFile('attachment') && $request->file('attachment')->isValid()) {
            
            // If a new file has been set, delete the old file from storage if any
            if (Storage::disk('public')->exists($announcement->attachment)) {
                Storage::disk('public')->delete($announcement->attachment);
            }
            
            $fileName = time() . '_' . $request->file('attachment')->getClientOriginalName();
            $filePath = $request->file('attachment')->storeAs('uploads', $fileName, 'public');
            $announcement->attachment = $filePath;
            $request->session()->flash('success', 'Η ανακοίνωση και το αρχείο με όνομα ('.$request->file('attachment')->getClientOriginalName().') καταχωρήθηκαν επιτυχώς.');
        }
        else {
            $request->session()->flash('success', 'Η ανακοίνωση ενημερώθηκε επιτυχώς.');
        }

        $announcement->save();

        return redirect()->route('announcements.index');
    }

    /**
     * Remove the specified announcement from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $announcement = Announcement::find($id);
        
        // Delete attachments if any from storage
        if (Storage::disk('public')->exists($announcement->attachment)) {
            Storage::disk('public')->delete($announcement->attachment);
        }

        $announcement->delete();

        return redirect()->route('announcements.index')->with('success', 'Η ανακοίνωση διαγράφηκε επιτυχώς.');
    }

    /**
     * Download the specified announcement's file from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function downloadFile($id)
    {
        $announcement = Announcement::find($id);

        return Storage::disk('public')->download($announcement->attachment, Str::of($announcement->attachment)->after('_'));
    }
}
