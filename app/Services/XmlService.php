<?php


namespace App\Services;

use App\Services\Interfaces\IXmlService;
use Illuminate\Http\Request;

class XmlService implements IXmlService
{

    public function store(Request $request)
    {
        dd(1);
        // TODO: Implement store() method.
    }

    function update(Request $request, $id)
    {
        // TODO: Implement update() method.
    }

    function all()
    {
        // TODO: Implement all() method.
    }

    function show($id)
    {
        // TODO: Implement show() method.
    }

    function destroy($id)
    {
        // TODO: Implement destroy() method.
    }

    function paginate($limit = 20)
    {
        // TODO: Implement paginate() method.
    }

    function xmlToArray($xml){
        $data = simplexml_load_file($xml);
        $data = json_decode(json_encode($data), true);
        return $data;
    }


    function validator($request){
        return \Validator::make($request->all(),['file' => 'required|file']);
    }
}
