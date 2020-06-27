<?php

namespace App\Http\Controllers;

use App\File;
use App\FileMechanism\Files;
use Illuminate\Http\Request;

class FilesController extends Controller
{
    public function index()
    {
        $data['files'] = File::all();
        return view('files.index', $data);
    }

    public function create()
    {
        return view('files.create');
    }

    public function store(Files $fileObj, Request $request)
    {
        $all_inputs = $request->input('all_files');
        if (count($all_inputs) > 0) {
            $objectBox = [];

            foreach ($all_inputs as $field) {
                if ($request->hasFile($field)) {
                    $created_at = date('Y-m-d H:i:s');

                    $dir_name = $field;

                    $files = $request->file($field);

                    if (is_array($files)) {
                        $has_title = $request->input($field . '_title');
                        $start = 0;
                        $end = !empty($has_title) ? count($has_title) - 1 : 0;

                        foreach ($files as $file) {

                            if ($start == $end) {
                                $title = $has_title[$end];
                            } else {
                                $title = $has_title[$start];
                            }

                            $image = $fileObj->upload_file($file, $dir_name);

                            array_push($objectBox, [
                                'uploaded_file' => $image,
                                'title' => $title,
                                'created_at' => $created_at
                            ]);

                            $start++;
                        }
                    } else {

                        $image = $fileObj->upload_file($files, $dir_name);
                        $title_input = $request->input($field . '_title');
                        $title = !empty($title_input) ? $title_input : ucfirst(str_replace('-', ' ', $field));

                        array_push($objectBox, [
                            'uploaded_file' => $image,
                            'title' => $title,
                            'created_at' => $created_at
                        ]);
                    }

                }
            }
            File::insert($objectBox);
        }
        session()->flash('message', 'Files has been submitted successfully.');
        return redirect('/files');
    }

    public function destroy(Request $request, $id)
    {

        if ($request->has('redirect_to')) {
            $redirect_to = $request->input('redirect_to');
        } else {
            $redirect_to = '/files';
        }

        $find_file = File::find('id', $id);
        $find_file->delete();

        session()->flash('message', 'File has been deleted successfully.');
        return redirect('files');
    }

}
