<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Blog;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Repositories\Sql\ClientRepository;
use App\Http\Requests\Dashboard\ClientRequest;

class ClientController extends Controller
{

    protected $clientRepository;

    public function __construct(ClientRepository $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }
    public function index()
    {
        $clients = $this->clientRepository->getAll();

        return view('dashboard.client.index', compact('clients'));
    }
    public function create()
    {
        return view('dashboard.client.create');
    }
    public function store(ClientRequest $request)
    {


        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('uploads/clients', 'public');
        }

        $client = $this->clientRepository->create($data);

        if ($client) {
            return redirect()->route('admin.client.index')->with('success', 'تم اضافة رأي العميل بنجاح');
        } else {
            return redirect()->route('admin.client.index')->with('error', 'حدث خطأ ما');
        }
    }

    public function edit($id)
    {
        $client = Client::findOrFail($id);

        return view('dashboard.client.edit', compact('client'));
    }


    public function update(ClientRequest $request, $id)
    {
        $data = $request->validated();
       $client = Client::findOrFail($id);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($client->image);
            $data['image'] = $request->file('image')->store('uploads/clients', 'public');
        }

        $client =   $client->update($data);

        if ($client) {
            return redirect()->route('admin.client.index')->with('success', 'تم تعديل رأي العميل بنجاح');
        } else {
            return redirect()->route('admin.client.index')->with('error', 'حدث خطأ ما');
        }
    }

    public function destroy($id)
    {

        $client =  Client::findOrFail($id);
        // $blog = $this->clientRepository->findOne($id);

        if ($client->image) {
            Storage::disk('public')->delete($client->image);
        }
        //   $this->categoryRepository->delete($request->id);
        $client->delete();

        return \response()->json([
            'message' => 'تم الحذف بنجاح',
        ]);
    }

    public function show($id)
    {
        return \redirect()->route('admin.client.index');
    }

}
