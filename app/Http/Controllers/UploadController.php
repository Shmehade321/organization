<?php

namespace App\Http\Controllers;

use Validator;
use App\Model\Organization;
use Illuminate\Http\Request;

class UploadController extends Controller
{

    public function index()
    {
        //Organization List
        $organizations = Organization::all();

        return view('upload', compact('organizations'));
    }

    public function import(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'organization' => 'required',
            'upload_file'  => 'required'
        ]);


        if ($validator->fails()) {
            return redirect('/')
                ->withErrors($validator)
                ->withInput();
        }


        $template = [
            '1' => [
                'first_name',
                'last_name',
                'employee_id',
                'email',
                'phone',
                'salary',
                'birthday'
            ],
            '2' => [
                'first_name',
                'last_name',
                'employee_id',
                'email',
                'birthday',
                'salary',
                'phone',
                'street1',
                'street2',
                'city',
                'state',
                'zip'
            ]
        ];

        $organizationID = $request->input('organization');
        $uploadedFile   = $request->file('upload_file');

        $filePath = $uploadedFile->getRealPath();


        $headers = $template[$organizationID];

        $row = null;
        if (($handler = fopen($filePath, 'r')) !== FALSE)
        {
            while (($row = fgetcsv($handler, 1000, ",")) !== FALSE)
            {
                //Store to db
            }
        }

    }

    public function download(Request $request)
    {
        $template = [
            '1' => [
                'first_name',
                'last_name',
                'employee_id',
                'email',
                'phone',
                'salary',
                'birthday'
            ],
            '2' => [
                'first_name',
                'last_name',
                'employee_id',
                'email',
                'birthday',
                'salary',
                'phone',
                'street1',
                'street2',
                'city',
                'state',
                'zip'
            ]
        ];

        if ($request->input('organizationID'))
        {

            $organizationID = $request->input('organizationID');

            $filename = 'template.csv';
            if ($organizationID == 1)
            {
                $filename = 'organization_a_template.csv';
            }
            elseif ($organizationID == 2)
            {
                $filename = 'organization_b_template.csv';
            }

            header('Content-Type: application/csv');
            header('Content-Disposition: attachment; filename="'.$filename.'";');



            $file = fopen('php://output', 'w');
            fputcsv($file, $template[$organizationID]);
            fclose($file);
        }
    }

}