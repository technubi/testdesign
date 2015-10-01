<?php
namespace App\Http\Controllers;
use App\Logic\Image\ImageRepository;
use Illuminate\Support\Facades\Input;
use File;
use App\Models\Image;
class ImageController extends Controller
{
    protected $image;
    public function __construct(ImageRepository $imageRepository)
    {
        $this->image = $imageRepository;
    }
    public function getUpload()
    {
        return view('testupload');
    }
    public function postUpload()
    {
        $photo = Input::all();
        debug($photo);
        $response = $this->image->upload($photo,$photo['detailwork_id'],'tempat');
        return $response;
    }
    public function deleteUpload()
    {
        $filename = Input::get('id');
        if(!$filename)
        {
            return 0;
        }
        $response = $this->image->delete( $filename );
        return $response;
    }

    public function delete($id){
        $file = Image::find($id);
        $path = public_path().'/uploads/icon_size/'.$file['filename'].'.jpg';
        $path2 = public_path().'/uploads/full_size/'.$file['filename'].'.jpg';
        File::Delete($path);
        File::Delete($path2);
        //$file->delete();
        return redirect()->back();

    }
}