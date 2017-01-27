<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Html\HtmlServiceProvider;
use App\Http\Requests;
use App\PopularOrganization;
use App\Status;
use Storage;

class PopularOrganizations extends Controller
{
      public function index()
    {
        $popularOrganizationList = PopularOrganization::all();
        $statusList = Status::all();
        return view('home', ['isBasicView' => false, 'title' => 'Organización Popular', 'route' => 'popularorganization', 'popularOrganizationList' => $popularOrganizationList, 'statusList' => $statusList]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'url' => 'required',
            'logo' => 'required'
            ]);

        $popularOrganization = new PopularOrganization();
        $popularOrganization->name = $request->name;       
        $popularOrganization->description = $request->description;
        $popularOrganization->url = $request->url;
        $popularOrganization->id_status = $request->status;
        
        $logo = $request->file('logo');
        $file_route = time()."_".$logo->getClientOriginalName();
        
        Storage::disk('imgLogo')->put($file_route, file_get_contents($logo->getRealPath()));
        $popularOrganization->logo = $file_route;


        $popularOrganization->save();
        if ($popularOrganization->save()) {
            return back()->with('aprovalMessage', 'Datos guardados correctamente');
        }
        else {
            return back()->with('errorMessage', 'Error al guardar los Datos'); 
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $popularOrganizationSelected  = PopularOrganization::find($id);
        $statusList = Status::all();
        return view('home', ['route' => 'popularorganization', 'title' => 'Organización Popular', 'isBasicView' => false, 'isEditable' => true, 'popularOrganizationSelected' => $popularOrganizationSelected, 'statusList' => $statusList]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'url' => 'required',
            'logo' => 'required'
            ]);
        $popularOrganization = PopularOrganization::find($id);
        $popularOrganization->name = $request->name;       
        $popularOrganization->description = $request->description;
        $popularOrganization->url = $request->url;
        $popularOrganization->id_status = $request->status;
        $logo = $request->file('logo');
        $file_route = time()."_".$logo->getClientOriginalName();
        
        Storage::disk('imgLogo')->put($file_route, file_get_contents($logo->getRealPath()));
        Storage::disk('imgLogo')->delete($request->img);
        $popularOrganization->logo = $file_route;


        $popularOrganization->save();
        if ($popularOrganization->save()) {
            //return redirect('home');
            $popularOrganizationList = PopularOrganization::all();
            return view('home', ['isBasicView' => false, 'isEditable' => false, 'title' => 'Organización Popular', 'route' => 'popularorganization', 'popularOrganizationList' => $popularOrganizationList]);
        }
        else {
            return back()->with('error_msg', 'Error al guardar los Datos'); 
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PopularOrganization::destroy($id);
        return back();
    }

}
