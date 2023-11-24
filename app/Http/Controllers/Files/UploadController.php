<?php

namespace App\Http\Controllers\Files;

use App\Http\Controllers\Controller;
use App\Models\UserUpload;
use Illuminate\Http\Request;

class UploadController extends Controller
{

    public function upload(Request $request)
    {

        $request->validate([
            'file' => 'required|mimetypes:image/jpeg,image/png,image/jpg,image/gif,video/mp4,video/quicktime,video/x-msvideo,video/x-flv,video/x-ms-wmv|max:20480000', // Adjust the allowed file types and maximum size as needed
        ]);
        //return ['status'=>1];
        if ($request->hasFile('file')) {
            $file = $request->file('file');

            return  $this->UploadHandler($file);
        }

        return response()->json([
            'error' => 'No file uploaded or invalid file type',
        ], 400);
    }

    private function UploadHandler($image)
    {
        $user = auth()->user(); // Get the authenticated user
        //return ['status'=>$user->id];
        // Validate the user and the uploaded image
        if ($user && $image) {
            // Generate a unique file name
            $image_new_name = time() . '_' . $image->getClientOriginalName();
            $image_url = 'images/listing/' . $image_new_name;

            $userUpload = new UserUpload([
                'user_id' => $user->id,
                'file_name' => $image_new_name,
                'file_path' => asset($image_url),
                'file_type' => $image->getClientMimeType(),
                'file_size' => $image->getSize(),
            ]);

            // Move the uploaded file to the public directory
            $isSuccess = $image->move(public_path('images/listing'), $image_new_name);

            if ($isSuccess) {
                // Create a new user upload record in the database

                // Save the user upload to the database
                $userUpload->save();

                // Update the corresponding property in your listing (if needed)
                //                $table_name = 'thumbnail_' . $key;
                //                if (file_exists($listing->$table_name)) {
                //                    unlink($listing->$table_name);
                //                }
                //                $listing->$table_name = $image_url;

                return
                    [
                        'id' => $userUpload->id,
                        'name' => $userUpload->file_name,
                        'url' => $userUpload->file_path, // Assumes a public storage setup
                        'type'=>$userUpload->file_type
                    ];

            }
        }

        return false;
    }

    public function getUpload(Request $request)
    {
        //  echo "hello";
        $user = auth()->user(); // Get the authenticated user
        // Fetch the list of uploaded images from the database
        $images = UserUpload::where('user_id',$user->id)->get();
        // Transform the image data as needed, for example, get the file URLs
        return $images->map(function ($image) {
            return [
                'id' => $image->id,
                'name' => $image->file_name,
                'url' => asset($image->file_path), // Assumes a public storage setup
                'type'=>$image->file_type
            ];
        });
    }
}
