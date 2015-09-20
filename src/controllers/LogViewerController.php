<?php
namespace BinhBEER\LogViewer;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Response;


class LogViewerController extends Controller
{

    public function index()
    {
        if (Input::get('l')) {
            LogViewer::setFile(base64_decode(Input::get('l')));
        }

        if (Input::get('dl')) {
            return Response::download(storage_path() . '/logs/' . base64_decode(Input::get('dl')));
        } elseif (Input::has('del')) {
            File::delete(storage_path() . '/logs/' . base64_decode(Input::get('del')));
            return Redirect::to(Request::url());
        }

        $logs = LogViewer::all();

        return View::make('laravel-log-viewer::log', [
            'logs' => $logs,
            'files' => LogViewer::getFiles(true),
            'current_file' => LogViewer::getFileName()
        ]);
    }

}
