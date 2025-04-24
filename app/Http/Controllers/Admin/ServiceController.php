<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Services\ServiceService;

class ServiceController extends Controller
{
    protected $serviceService;

    public function __construct(ServiceService $serviceService)
    {
        $this->serviceService = $serviceService;
    }

    public function index()
    {
        $services = $this->serviceService->all();
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'icon' => 'required|string',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'button_text' => 'nullable|string|max:255',
            'button_link' => 'nullable|url',
        ]);
        $this->serviceService->create($data);
        return redirect()->route('admin.services.index')->with('success', 'Service created!');
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $data = $request->validate([
            'icon' => 'required|string',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'button_text' => 'nullable|string|max:255',
            'button_link' => 'nullable|url',
        ]);
        $this->serviceService->update($service, $data);
        return redirect()->route('admin.services.index')->with('success', 'Service updated!');
    }

    public function destroy(Service $service)
    {
        $this->serviceService->delete($service);
        return redirect()->route('admin.services.index')->with('success', 'Service deleted!');
    }
}
