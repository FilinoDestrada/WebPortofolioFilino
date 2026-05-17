<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Dashboard - Tampilkan semua data proyek (menggantikan dashboard.php)
     */
    public function index()
    {
        $projects = Project::orderBy('id', 'desc')->get();
        return view('admin.dashboard', compact('projects'));
    }

    /**
     * Form tambah data (menggantikan add.php - tampilan form)
     */
    public function create()
    {
        return view('admin.add');
    }

    /**
     * Simpan data baru (menggantikan add.php - proses simpan)
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'year'        => 'required|string|max:10',
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Project::create($validated);

        return redirect()->route('dashboard')
            ->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Tampilkan detail proyek (menggantikan view.php)
     */
    public function show(Project $project)
    {
        return view('admin.view', compact('project'));
    }

    /**
     * Form edit data (menggantikan edit.php - tampilan form)
     */
    public function edit(Project $project)
    {
        return view('admin.edit', compact('project'));
    }

    /**
     * Update data (menggantikan edit.php - proses update)
     */
    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'year'        => 'required|string|max:10',
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $project->update($validated);

        return redirect()->route('dashboard')
            ->with('success', 'Data berhasil diubah!');
    }

    /**
     * Hapus data (menggantikan delete.php)
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('dashboard')
            ->with('success', 'Data berhasil dihapus!');
    }
}
