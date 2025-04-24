<?php

namespace App\Services;

use App\Models\Service;

class ServiceService
{
    public function all()
    {
        return Service::all();
    }

    public function create(array $data)
    {
        return Service::create($data);
    }

    public function update(Service $service, array $data)
    {
        return $service->update($data);
    }

    public function delete(Service $service)
    {
        return $service->delete();
    }
}
