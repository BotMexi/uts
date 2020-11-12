<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jsonurl = "storage/data.json";
        $json = file_get_contents($jsonurl);
        $data = json_decode($json);
        return view('blog.index', compact('data'));
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jsonurl = "storage/data.json";
        $json = file_get_contents($jsonurl);
        $data = json_decode($json);
        $new = (object)[
            'title' => $request->title,
            'content' => $request->content,
            'author' => $request->author,
            'datetime' => date('Y-m-d H:i:s')
        ];
        array_push($data, $new);
//        dd($data);
        file_put_contents($jsonurl, json_encode($data));
        return redirect(route('blog.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jsonurl = "storage/data.json";
        $json = file_get_contents($jsonurl);
        $datas = json_decode($json);
        $data = [];
        foreach ($datas as $d) {
            if ($id == $d->title) {
                $data = $d;
                break;
            }
        }
        if (!$data) {
            abort(404);
        }
        return view('blog.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jsonurl = "storage/data.json";
        $json = file_get_contents($jsonurl);
        $datas = json_decode($json);
        $data = [];
        foreach ($datas as $d) {
            if ($id == $d->title) {
                $data = $d;
                break;
            }
        }
        if (!$data) {
            abort(404);
        }
        return view('blog.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $jsonurl = "storage/data.json";
        $json = file_get_contents($jsonurl);
        $data = json_decode($json);

        foreach ($data as $d) {
            if ($id == $d->title) {
                $d->title = $request->title;
                $d->author = $request->author;
                $d->content = $request->content;
                $d->datetime = (new \DateTime('now', new \DateTimeZone('Asia/Jakarta')))->format("Y-m-d H:i:s");
                file_put_contents("storage/data.json", json_encode($data));
                break;
            }
        }
        return redirect(route('blog.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jsonurl = "storage/data.json";
        $json = file_get_contents($jsonurl);
        $data = json_decode($json);
        $array_data = [];
        foreach ($data as $d) {
            if ($id == $d->title) {
                continue;
            }
            array_push($array_data, $d);
        }
//        dd($array_data);
        file_put_contents($jsonurl, json_encode($array_data));
        return redirect(route('blog.index'));
    }
}
